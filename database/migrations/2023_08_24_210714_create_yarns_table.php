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
        Schema::create('yarns', function (Blueprint $table) {
            $table->id();
            $table->string('yarn_name');
            $table->integer('category_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->decimal('yarn_totalweight')->nullable();
            $table->integer('yarn_totalqtty')->nullable();
            $table->decimal('yarn_weightpunt')->nullable();
            $table->string('yarn_color')->nullable();
            $table->string('yarn_image')->nullable();
            $table->string('yarn_garage')->nullable();
            $table->string('production_model')->nullable();
            $table->string('production_estimate')->nullable();
            $table->string('buying_date')->nullable();
            $table->string('buying_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yarns');
    }
};
