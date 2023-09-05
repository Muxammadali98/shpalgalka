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
        Schema::create('sale__products', function (Blueprint $table) {
            $table->id();
            $table->string('sale_id');
            $table->string('product_id');
            $table->string('status')->default('0');
            $table->string('date')->nullable();
            $table->integer('count')->default(1);
            $table->integer('startPrice')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale__products');
    }
};
