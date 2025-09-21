<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            // SEO Fields
            $table->string('meta_title')->nullable()->after('title');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->json('meta_keywords')->nullable()->after('meta_description');
            $table->string('canonical_url')->nullable()->after('meta_keywords');
            $table->string('og_title')->nullable()->after('canonical_url');
            $table->text('og_description')->nullable()->after('og_title');
            $table->string('og_image')->nullable()->after('og_description');
            $table->string('og_type')->default('article')->after('og_image');
            $table->string('twitter_card')->default('summary_large_image')->after('og_type');
            $table->string('twitter_title')->nullable()->after('twitter_card');
            $table->text('twitter_description')->nullable()->after('twitter_title');
            $table->string('twitter_image')->nullable()->after('twitter_description');
            
            // Additional Blog Fields
            $table->json('focus_keywords')->nullable()->after('twitter_image');
            $table->integer('reading_time')->default(0)->after('focus_keywords');
            $table->string('status')->default('draft')->after('reading_time'); // draft, published, scheduled
            $table->timestamp('scheduled_at')->nullable()->after('status');
            $table->boolean('allow_comments')->default(true)->after('scheduled_at');
            $table->boolean('is_featured')->default(false)->after('allow_comments');
            $table->integer('sort_order')->default(0)->after('is_featured');
            
            // Analytics & SEO tracking
            $table->decimal('seo_score', 5, 2)->default(0)->after('sort_order');
            $table->integer('word_count')->default(0)->after('seo_score');
            $table->json('readability_data')->nullable()->after('word_count');
            $table->timestamp('last_seo_check')->nullable()->after('readability_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
