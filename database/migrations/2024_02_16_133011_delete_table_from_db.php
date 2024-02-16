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
        Schema::dropIfExists('girls');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('girls', function (Blueprint $table) {
            $table->id();
            $table->string('FIO')->nullable();
            $table->unsignedBigInteger('Age')->default(1);
            $table->timestamps();
        });
    }
};
