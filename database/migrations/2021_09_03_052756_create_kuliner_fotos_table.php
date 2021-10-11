<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKulinerFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuliner_fotos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_kuliner');
            $table->foreign('id_kuliner')->references('id')->on('kuliners')->constrained()->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('kuliner_fotos');
    }
}
