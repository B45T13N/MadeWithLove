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
        Schema::create('addables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('itemId');
            $table->unsignedBigInteger('basketId');
            $table->foreign('itemId')->references('id')->on('items');
            $table->foreign('basketId')->references('id')->on('baskets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addables');
    }
};
