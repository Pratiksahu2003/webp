<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'template',
        'page_builder_data',
        'seo_settings',
        'page_settings',
        'featured_image',
        'is_published',
        'published_at',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'page_builder_data' => 'array',
        'seo_settings' => 'array',
        'page_settings' => 'array',
        'is_published' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return request()->is('admin/*') ? 'id' : 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
