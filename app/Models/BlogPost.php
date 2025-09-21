<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'category',
        'tags',
        'author',
        'published_at',
        'is_published',
        'views',
        // SEO Fields
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        // Additional Fields
        'focus_keywords',
        'reading_time',
        'status',
        'scheduled_at',
        'allow_comments',
        'is_featured',
        'sort_order',
        'seo_score',
        'word_count',
        'readability_data',
        'last_seo_check'
    ];

    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'meta_keywords' => 'array',
        'focus_keywords' => 'array',
        'scheduled_at' => 'datetime',
        'allow_comments' => 'boolean',
        'is_featured' => 'boolean',
        'seo_score' => 'decimal:2',
        'readability_data' => 'array',
        'last_seo_check' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('published_at', '<=', now());
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    // SEO and Status Scopes
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled')
                    ->where('scheduled_at', '>', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // SEO Helper Methods
    public function getEffectiveMetaTitle()
    {
        return $this->meta_title ?: $this->title;
    }

    public function getEffectiveMetaDescription()
    {
        return $this->meta_description ?: $this->excerpt;
    }

    public function getEffectiveOgTitle()
    {
        return $this->og_title ?: $this->getEffectiveMetaTitle();
    }

    public function getEffectiveOgDescription()
    {
        return $this->og_description ?: $this->getEffectiveMetaDescription();
    }

    public function getEffectiveTwitterTitle()
    {
        return $this->twitter_title ?: $this->getEffectiveOgTitle();
    }

    public function getEffectiveTwitterDescription()
    {
        return $this->twitter_description ?: $this->getEffectiveOgDescription();
    }

    // Calculate reading time based on word count
    public function calculateReadingTime()
    {
        $wordsPerMinute = 200; // Average reading speed
        return ceil($this->word_count / $wordsPerMinute);
    }

    // Calculate word count from content
    public function calculateWordCount()
    {
        return str_word_count(strip_tags($this->content));
    }

    // Auto-generate slug from title
    public function generateSlug()
    {
        $slug = \Str::slug($this->title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->where('id', '!=', $this->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    // Calculate SEO score based on various factors
    public function calculateSeoScore()
    {
        $score = 0;
        $maxScore = 100;

        // Title checks (20 points)
        if ($this->title && strlen($this->title) >= 30 && strlen($this->title) <= 60) {
            $score += 10;
        }
        if ($this->meta_title && strlen($this->meta_title) >= 30 && strlen($this->meta_title) <= 60) {
            $score += 10;
        }

        // Description checks (20 points)
        if ($this->meta_description && strlen($this->meta_description) >= 120 && strlen($this->meta_description) <= 160) {
            $score += 20;
        }

        // Content checks (30 points)
        if ($this->word_count >= 300) {
            $score += 15;
        }
        if ($this->focus_keywords && count($this->focus_keywords) > 0) {
            $score += 15;
        }

        // Image checks (15 points)
        if ($this->featured_image) {
            $score += 10;
        }
        if ($this->og_image) {
            $score += 5;
        }

        // URL and technical checks (15 points)
        if ($this->slug && strlen($this->slug) <= 75) {
            $score += 10;
        }
        if ($this->canonical_url) {
            $score += 5;
        }

        return round(($score / $maxScore) * 100, 2);
    }

    // Boot method to handle automatic calculations
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            // Auto-generate slug if not provided
            if (!$post->slug) {
                $post->slug = $post->generateSlug();
            }

            // Calculate word count
            $post->word_count = $post->calculateWordCount();

            // Calculate reading time
            $post->reading_time = $post->calculateReadingTime();

            // Calculate SEO score
            $post->seo_score = $post->calculateSeoScore();

            // Update SEO check timestamp
            $post->last_seo_check = now();
        });
    }

    // Relationship methods
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'author', 'id');
    }

    // Attribute accessors
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'draft' => 'Draft',
            'published' => 'Published',
            'scheduled' => 'Scheduled',
            default => 'Unknown'
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'draft' => 'yellow',
            'published' => 'green',
            'scheduled' => 'blue',
            default => 'gray'
        };
    }

    public function getReadingTimeFormattedAttribute()
    {
        if ($this->reading_time <= 1) {
            return '1 min read';
        }
        return $this->reading_time . ' min read';
    }
}
