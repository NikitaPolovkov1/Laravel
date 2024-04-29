<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('house_name');
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('arrival_date');
            $table->string('departure_date');
            $table->string('children_count');
            $table->string('adult_count');
            $table->string('tariff');
            $table->string('price_at_day', 10, 2);
            $table->string('nights_count');
            $table->string('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
