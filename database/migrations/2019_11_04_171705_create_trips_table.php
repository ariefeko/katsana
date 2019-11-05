<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vehicle_id');
            $table->json('start')->nullable();
            $table->json('end')->nullable();
            $table->string('distance')->nullable();
            $table->string('duration')->nullable();
            $table->string('max_speed')->nullable();
            $table->string('average_speed')->nullable();
            $table->string('idle_duration')->nullable();
            $table->string('score')->nullable();
            $table->json('idles')->nullable();
            $table->json('violations')->nullable();
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
        Schema::dropIfExists('trips');
    }
}
