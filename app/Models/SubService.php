<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class SubService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id', 'title', 'slug', 'image', 'short_description', 'description',
        'starting_price', 'delivery_days', 'sort_order', 'status',
    ];

    protected $casts = [
        'starting_price' => 'decimal:2',
        'status' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $subService) {
            if (empty($subService->slug)) {
                $subService->slug = Str::slug($subService->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return request()->is('admin/*') ? 'id' : 'slug';
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(ServicePackage::class)->orderBy('sort_order');
    }

    public function activePackages(): HasMany
    {
        return $this->packages()->where('status', true);
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(SubServiceFaq::class)->orderBy('sort_order');
    }

    public function whyChooseUs(): HasMany
    {
        return $this->hasMany(SubServiceWhyChooseUs::class)->orderBy('sort_order');
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'sub_service_technology');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function getEffectivePriceAttribute(): float
    {
        $package = $this->activePackages()->first();

        if ($package) {
            return (float) ($package->sale_price ?? $package->price);
        }

        return (float) $this->starting_price;
    }
}
