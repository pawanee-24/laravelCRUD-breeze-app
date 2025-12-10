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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable()->unique();
            $table->text('address')->nullable();
            $table->text('note')->nullable();

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
        Schema::dropIfExists('suppliers');
    }
};
