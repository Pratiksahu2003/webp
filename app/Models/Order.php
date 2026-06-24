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
        'order_number', 'user_id', 'service_id', 'sub_service_id', 'package_id',
        'amount', 'payment_gateway', 'payment_status', 'transaction_id',
        'customer_message', 'billing_details', 'paid_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'billing_details' => 'array',
        'paid_at' => 'datetime',
    ];

    public const PAYMENT_STATUSES = [
        'pending', 'processing', 'paid', 'failed', 'cancelled', 'refunded',
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
