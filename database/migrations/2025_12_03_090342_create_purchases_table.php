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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('suppiler_id');
            $table->integer('quantity')->default(0);
            $table->decimal('item_cost_price', 10, 2)->nullable();
            $table->decimal('total_cost_price', 10, 2)->nullable();
            $table->integer('warranty_months')->default(0);
            $table->date('warranty_end')->nullable();

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
        Schema::dropIfExists('purchases');
    }
};
