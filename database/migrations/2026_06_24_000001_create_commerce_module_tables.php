<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('services', function (Blueprint $table) {
            if (! Schema::hasColumn('services', 'service_category_id')) {
                $table->foreignId('service_category_id')->nullable()->after('id')->constrained()->nullOnDelete();
            }
            if (! Schema::hasColumn('services', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('title');
            }
            if (! Schema::hasColumn('services', 'banner_image')) {
                $table->string('banner_image')->nullable()->after('icon');
            }
            if (! Schema::hasColumn('services', 'short_description')) {
                $table->text('short_description')->nullable()->after('banner_image');
            }
            if (! Schema::hasColumn('services', 'seo_title')) {
                $table->string('seo_title')->nullable()->after('description');
            }
            if (! Schema::hasColumn('services', 'seo_description')) {
                $table->text('seo_description')->nullable()->after('seo_title');
            }
            if (! Schema::hasColumn('services', 'seo_keywords')) {
                $table->string('seo_keywords')->nullable()->after('seo_description');
            }
            if (! Schema::hasColumn('services', 'status')) {
                $table->boolean('status')->default(true)->after('sort_order');
            }
            if (! Schema::hasColumn('services', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        Schema::create('sub_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('starting_price', 12, 2)->default(0);
            $table->unsignedInteger('delivery_days')->default(7);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['service_id', 'slug']);
        });

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_service_id')->constrained()->cascadeOnDelete();
            $table->string('package_name');
            $table->string('slug');
            $table->decimal('price', 12, 2);
            $table->decimal('sale_price', 12, 2)->nullable();
            $table->unsignedInteger('delivery_days')->default(7);
            $table->unsignedInteger('revisions')->default(1);
            $table->string('support_period')->nullable();
            $table->string('badge')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['sub_service_id', 'slug']);
        });

        Schema::create('package_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('feature_title');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sub_service_faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_service_id')->constrained()->cascadeOnDelete();
            $table->string('question');
            $table->longText('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sub_service_why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_service_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('technologies', function (Blueprint $table) {
            if (! Schema::hasColumn('technologies', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('name');
            }
            if (! Schema::hasColumn('technologies', 'logo')) {
                $table->string('logo')->nullable()->after('icon');
            }
            if (! Schema::hasColumn('technologies', 'website_url')) {
                $table->string('website_url')->nullable()->after('description');
            }
            if (! Schema::hasColumn('technologies', 'technology_type')) {
                $table->string('technology_type')->nullable()->after('website_url');
            }
            if (! Schema::hasColumn('technologies', 'status')) {
                $table->boolean('status')->default(true)->after('sort_order');
            }
            if (! Schema::hasColumn('technologies', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        Schema::create('sub_service_technology', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->unique(['sub_service_id', 'technology_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('company_name')->nullable()->after('phone');
            $table->string('address_line_1')->nullable()->after('company_name');
            $table->string('address_line_2')->nullable()->after('address_line_1');
            $table->string('city')->nullable()->after('address_line_2');
            $table->string('state')->nullable()->after('city');
            $table->string('country')->nullable()->after('state');
            $table->string('postal_code')->nullable()->after('country');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->restrictOnDelete();
            $table->foreignId('sub_service_id')->constrained()->restrictOnDelete();
            $table->foreignId('package_id')->constrained()->restrictOnDelete();
            $table->decimal('amount', 12, 2);
            $table->string('payment_gateway')->default('nimbbl');
            $table->enum('payment_status', [
                'pending', 'processing', 'paid', 'failed', 'cancelled', 'refunded',
            ])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->text('customer_message')->nullable();
            $table->json('billing_details')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('transaction_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->decimal('amount', 12, 2);
            $table->json('gateway_response')->nullable();
            $table->enum('payment_status', [
                'pending', 'processing', 'paid', 'failed', 'cancelled', 'refunded',
            ])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
        Schema::dropIfExists('orders');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'company_name', 'address_line_1', 'address_line_2',
                'city', 'state', 'country', 'postal_code',
            ]);
        });

        Schema::dropIfExists('sub_service_technology');
        Schema::dropIfExists('sub_service_why_choose_us');
        Schema::dropIfExists('sub_service_faqs');
        Schema::dropIfExists('package_features');
        Schema::dropIfExists('packages');
        Schema::dropIfExists('sub_services');
        Schema::dropIfExists('service_categories');

        Schema::table('services', function (Blueprint $table) {
            $columns = ['service_category_id', 'slug', 'banner_image', 'short_description',
                'seo_title', 'seo_description', 'seo_keywords', 'status', 'deleted_at'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('services', $column)) {
                    if ($column === 'service_category_id') {
                        $table->dropConstrainedForeignId('service_category_id');
                    } else {
                        $table->dropColumn($column);
                    }
                }
            }
        });

        Schema::table('technologies', function (Blueprint $table) {
            foreach (['slug', 'logo', 'website_url', 'technology_type', 'status', 'deleted_at'] as $column) {
                if (Schema::hasColumn('technologies', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
