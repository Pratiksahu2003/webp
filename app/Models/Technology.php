<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'category', 'technology_type', 'icon', 'logo', 'image',
        'color', 'description', 'website_url', 'is_active', 'status', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'status' => 'boolean',
    ];

    public const TYPES = [
        'Programming Language',
        'Framework',
        'Frontend',
        'Backend',
        'Database',
        'Mobile',
        'Cloud',
        'DevOps',
        'AI/ML',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $technology) {
            if (empty($technology->slug)) {
                $technology->slug = Str::slug($technology->name);
            }
        });
    }

    public function subServices(): BelongsToMany
    {
        return $this->belongsToMany(SubService::class, 'sub_service_technology');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function stackSlug(): ?string
    {
        return \App\Support\TechnologyStack::slugForCategory($this->category ?? '');
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

    public function iconIsImage(): bool
    {
        return filled($this->icon) && (
            str_contains($this->icon, 'technologies/') ||
            str_contains($this->icon, '/')
        );
    }

    public function displayIconUrl(): ?string
    {
        if ($this->logo) {
            return Storage::disk('public')->url($this->logo);
        }

        if ($this->iconIsImage()) {
            return Storage::disk('public')->url($this->icon);
        }

        return null;
    }

    public function imageUrl(): ?string
    {
        return $this->image
            ? Storage::disk('public')->url($this->image)
            : null;
    }
}
