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
        Schema::table('pages', function (Blueprint $table) {
            $table->json('page_builder_data')->nullable()->after('content');
            $table->string('template')->default('default')->after('page_builder_data');
            $table->json('seo_settings')->nullable()->after('meta_description');
            $table->json('page_settings')->nullable()->after('seo_settings');
            $table->string('featured_image')->nullable()->after('page_settings');
            $table->timestamp('published_at')->nullable()->after('featured_image');
            $table->boolean('is_published')->default(false)->after('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'page_builder_data',
                'template',
                'seo_settings',
                'page_settings',
                'featured_image',
                'published_at',
                'is_published'
            ]);
        });
    }
};