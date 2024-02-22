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
        Schema::create('house_dates', function (Blueprint $table) {
            $table->integer('houseID')->unsigned();
            $table->integer('dateID')->unsigned();
            $table->primary(['houseID', 'dateID']);
            $table->foreign('houseID')->references('houseID')->on('houses')->onDelete('cascade');
            $table->foreign('dateID')->references('dateID')->on('dates')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_dates');
    }
};
