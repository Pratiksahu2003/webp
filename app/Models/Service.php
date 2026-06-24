<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_category_id',
        'title',
        'slug',
        'icon',
        'banner_image',
        'short_description',
        'description',
        'content',
        'image',
        'features',
        'category',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'sort_order',
        'status',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'status' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return request()->is('admin/*') ? 'id' : 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function subServices(): HasMany
    {
        return $this->hasMany(SubService::class)->orderBy('sort_order');
    }

    public function activeSubServices(): HasMany
    {
        return $this->subServices()->where('status', true);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->where('status', true)->orWhere('is_active', true);
        });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function isActive(): bool
    {
        return (bool) ($this->status ?? $this->is_active);
    }
}
