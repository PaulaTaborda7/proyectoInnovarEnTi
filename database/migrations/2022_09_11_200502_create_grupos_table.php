<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('gruNombre');
            $table->string('gruIdGrupo')->unique();
            $table->string('gruJornada');
            $table->integer('gruCantEstudiante');
            $table->integer('gruCantMateria');
            $table->string('insCodigoNit');
            $table->foreign('insCodigoNit')->references('codigoNit')->on('institucions');
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
        Schema::dropIfExists('grupos');
    }
};
