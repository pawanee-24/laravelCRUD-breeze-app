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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('quantity')->default(0);
            $table->decimal('item_selling_price', 10, 2)->nullable();
            $table->decimal('total_selling_price', 10, 2)->nullable();

            $table->integer('warranty_months')->default(0); // e.g 12 months
            $table->date('warranty_start')->nullable(); // sale date
            $table->date('warranty_end')->nullable(); // sale date + months

            $table->string('invoice_number')->unique();
            $table->date('sale_date');

            // Customer details
            $table->string('customer_name')->nullable();
            $table->string('customer_phone', 20)->nullable();
            $table->string('customer_email')->nullable();
            $table->text('customer_address')->nullable();

            $table->integer('created_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->integer('updated_at')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->integer('deleted_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->unsignedTinyInteger('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
