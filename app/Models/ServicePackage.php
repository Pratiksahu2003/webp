<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ServicePackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'packages';

    protected $fillable = [
        'sub_service_id', 'package_name', 'slug', 'price', 'sale_price',
        'delivery_days', 'revisions', 'support_period', 'badge',
        'description', 'sort_order', 'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'status' => 'boolean',
    ];

    public const BADGES = [
        'Most Popular',
        'Recommended',
        'Best Value',
        'Enterprise',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $package) {
            if (empty($package->slug)) {
                $package->slug = Str::slug($package->package_name);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function subService(): BelongsTo
    {
        return $this->belongsTo(SubService::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(PackageFeature::class, 'package_id')->orderBy('sort_order');
    }

    public function activeFeatures(): HasMany
    {
        return $this->features()->where('status', true);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'package_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function getFinalPriceAttribute(): float
    {
        return (float) ($this->sale_price ?? $this->price);
    }

    public function hasDiscount(): bool
    {
        return $this->sale_price !== null && $this->sale_price < $this->price;
    }
}
