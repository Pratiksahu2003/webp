<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number', 'source', 'user_id', 'service_id', 'sub_service_id', 'package_id',
        'amount', 'invoice_title', 'line_items', 'payment_gateway', 'payment_status',
        'transaction_id', 'customer_message', 'notes', 'billing_details', 'paid_at',
        'invoice_sent_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'billing_details' => 'array',
        'line_items' => 'array',
        'paid_at' => 'datetime',
        'invoice_sent_at' => 'datetime',
    ];

    public const PAYMENT_STATUSES = [
        'pending', 'processing', 'paid', 'failed', 'cancelled', 'refunded',
    ];

    public const SOURCES = [
        'checkout', 'admin',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $order) {
            if (empty($order->order_number)) {
                $order->order_number = 'ORD-'.strtoupper(uniqid());
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function subService(): BelongsTo
    {
        return $this->belongsTo(SubService::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(ServicePackage::class, 'package_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(PaymentTransaction::class);
    }

    public function latestTransaction()
    {
        return $this->hasOne(PaymentTransaction::class)->latestOfMany();
    }

    public function scopeStatus($query, ?string $status)
    {
        if ($status) {
            $query->where('payment_status', $status);
        }

        return $query;
    }

    public function scopeAdminSource($query)
    {
        return $query->where('source', 'admin');
    }

    public function isCustom(): bool
    {
        return $this->package_id === null;
    }

    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    public function canAcceptPayment(): bool
    {
        return in_array($this->payment_status, ['pending', 'processing', 'failed'], true);
    }

    public function displayTitle(): string
    {
        if ($this->invoice_title) {
            return $this->invoice_title;
        }

        if ($this->package) {
            return $this->package->package_name;
        }

        $items = $this->lineItemsForDisplay();

        if ($items !== []) {
            return (string) ($items[0]['title'] ?? 'Invoice');
        }

        return 'Invoice';
    }

    /**
     * @return list<array{title: string, description: string, quantity: float|int, rate: float, amount: float}>
     */
    public function lineItemsForDisplay(): array
    {
        if (is_array($this->line_items) && $this->line_items !== []) {
            return collect($this->line_items)->map(function ($item) {
                $quantity = (float) ($item['quantity'] ?? 1);
                $rate = (float) ($item['rate'] ?? 0);

                return [
                    'title' => (string) ($item['title'] ?? 'Item'),
                    'description' => (string) ($item['description'] ?? ''),
                    'quantity' => $quantity,
                    'rate' => $rate,
                    'amount' => round($quantity * $rate, 2),
                ];
            })->values()->all();
        }

        if ($this->package) {
            $title = $this->package->package_name;
            $description = trim(($this->service?->title ?? '').' — '.($this->subService?->title ?? ''), ' —');

            return [[
                'title' => $title,
                'description' => $description,
                'quantity' => 1,
                'rate' => (float) $this->amount,
                'amount' => (float) $this->amount,
            ]];
        }

        return [[
            'title' => $this->invoice_title ?: 'Invoice',
            'description' => '',
            'quantity' => 1,
            'rate' => (float) $this->amount,
            'amount' => (float) $this->amount,
        ]];
    }

    public function markAsPaid(string $transactionId, array $gatewayResponse = []): bool
    {
        if ($this->payment_status === 'paid') {
            return false;
        }

        $this->update([
            'payment_status' => 'paid',
            'transaction_id' => $transactionId,
            'paid_at' => now(),
        ]);

        $this->transactions()->create([
            'transaction_id' => $transactionId,
            'payment_id' => $gatewayResponse['payment_id'] ?? $gatewayResponse['nimbbl_payment_id'] ?? null,
            'amount' => $this->amount,
            'gateway_response' => $gatewayResponse,
            'payment_status' => 'paid',
        ]);

        return true;
    }

    public function signedInvoiceUrl(?\DateTimeInterface $expiresAt = null): string
    {
        return URL::temporarySignedRoute(
            'invoice.download',
            $expiresAt ?? now()->addDays(90),
            ['order' => $this->id],
        );
    }

    public function signedPaymentUrl(?\DateTimeInterface $expiresAt = null): string
    {
        return URL::temporarySignedRoute(
            'payment.link',
            $expiresAt ?? now()->addDays(30),
            ['order' => $this->id],
        );
    }

    public function markAsFailed(array $gatewayResponse = []): void
    {
        $this->update(['payment_status' => 'failed']);

        $this->transactions()->create([
            'transaction_id' => $gatewayResponse['transaction_id'] ?? null,
            'payment_id' => $gatewayResponse['payment_id'] ?? null,
            'amount' => $this->amount,
            'gateway_response' => $gatewayResponse,
            'payment_status' => 'failed',
        ]);
    }
}
