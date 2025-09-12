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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('original_name');
            $table->string('path');
            $table->string('disk')->default('public');
            $table->string('mime_type');
            $table->bigInteger('size');
            $table->string('extension');
            $table->json('metadata')->nullable();
            $table->string('alt_text')->nullable();
            $table->text('description')->nullable();
            $table->string('folder')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('is_optimized')->default(false);
            $table->timestamps();

            $table->index(['mime_type', 'folder']);
            $table->index(['user_id', 'created_at']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
