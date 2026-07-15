<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('pages');
    }

    public function down(): void
    {
        // Pages CMS was removed; no restore path.
    }
};
