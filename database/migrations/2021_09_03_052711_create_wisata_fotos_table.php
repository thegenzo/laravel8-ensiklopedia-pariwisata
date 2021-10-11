<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata_fotos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_wisata');
            $table->foreign('id_wisata')->references('id')->on('wisatas')->constrained()->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('wisata_fotos');
    }
}
