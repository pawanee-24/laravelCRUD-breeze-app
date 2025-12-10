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
        Schema::create('product_items', function (Blueprint $table) {
            $table->id(); //primary key
            $table->string('serial_number')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('model')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('warranty_months')->default(0);
            $table->decimal('item_cost_price', 10, 2)->nullable();
            $table->decimal('total_cost_price', 10, 2)->nullable();
            $table->decimal('item_selling_price', 10, 2)->nullable();
            $table->decimal('total_selling_price', 10, 2)->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('product_items');
    }
};
