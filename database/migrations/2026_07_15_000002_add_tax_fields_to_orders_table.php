<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('subtotal', 12, 2)->nullable()->after('amount');
            $table->decimal('tax_amount', 12, 2)->default(0)->after('subtotal');
            $table->decimal('cgst_amount', 12, 2)->default(0)->after('tax_amount');
            $table->decimal('sgst_amount', 12, 2)->default(0)->after('cgst_amount');
            $table->decimal('igst_amount', 12, 2)->default(0)->after('sgst_amount');
            $table->boolean('is_interstate')->default(false)->after('igst_amount');
            $table->string('place_of_supply')->nullable()->after('is_interstate');
            $table->string('buyer_gstin')->nullable()->after('place_of_supply');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'subtotal', 'tax_amount', 'cgst_amount', 'sgst_amount', 'igst_amount',
                'is_interstate', 'place_of_supply', 'buyer_gstin',
            ]);
        });
    }
};
