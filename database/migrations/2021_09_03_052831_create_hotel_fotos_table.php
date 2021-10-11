<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_fotos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_hotel');
            $table->foreign('id_hotel')->references('id')->on('hotels')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('foto')->nullable();
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
        Schema::dropIfExists('hotel_fotos');
    }
}
