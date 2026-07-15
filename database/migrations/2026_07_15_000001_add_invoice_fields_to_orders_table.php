<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['sub_service_id']);
            $table->dropForeign(['package_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable()->change();
            $table->unsignedBigInteger('sub_service_id')->nullable()->change();
            $table->unsignedBigInteger('package_id')->nullable()->change();

            $table->string('source')->default('checkout')->after('order_number');
            $table->string('invoice_title')->nullable()->after('amount');
            $table->json('line_items')->nullable()->after('invoice_title');
            $table->text('notes')->nullable()->after('customer_message');
            $table->timestamp('invoice_sent_at')->nullable()->after('paid_at');

            $table->foreign('service_id')->references('id')->on('services')->restrictOnDelete();
            $table->foreign('sub_service_id')->references('id')->on('sub_services')->restrictOnDelete();
            $table->foreign('package_id')->references('id')->on('packages')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['sub_service_id']);
            $table->dropForeign(['package_id']);
            $table->dropColumn(['source', 'invoice_title', 'line_items', 'notes', 'invoice_sent_at']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable(false)->change();
            $table->unsignedBigInteger('sub_service_id')->nullable(false)->change();
            $table->unsignedBigInteger('package_id')->nullable(false)->change();

            $table->foreign('service_id')->references('id')->on('services')->restrictOnDelete();
            $table->foreign('sub_service_id')->references('id')->on('sub_services')->restrictOnDelete();
            $table->foreign('package_id')->references('id')->on('packages')->restrictOnDelete();
        });
    }
};
