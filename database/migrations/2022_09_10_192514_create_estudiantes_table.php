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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('numIdentidad');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('tipo');
            $table->string('password');
            $table->float('estPromedio');
            $table->string('insCodigoNit');
            $table->foreign('insCodigoNit')->references('codigoNit')->on('institucions');
            $table->string('numIdentidadPadre');
            //$table->foreign('numIdentidadPadre')->references('numIdentidad')->on('padres');
            $table->string('gruIdCurso');
            //$table->foreign('gruIdCurso')->references('gruIdGrupo')->on('grupos');
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
        Schema::dropIfExists('estudiantes');
    }
};
