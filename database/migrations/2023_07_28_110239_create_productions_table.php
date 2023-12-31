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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('production_name');
            $table->integer('category_id');
            $table->integer('customer_id')->nullable();
            $table->string('production_image')->nullable();
            $table->string('production_store')->nullable();
            $table->decimal('production_weight')->nullable();
            $table->string('deadline_date')->nullable();
            $table->string('cost_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('profit_price')->nullable(); 
            $table->string('profit_quantity')->nullable();
            $table->string('production_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
