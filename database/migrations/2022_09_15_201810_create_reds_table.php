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
        Schema::create('reds', function (Blueprint $table) {
            $table->id();
            $table->string('redNombre');
            $table->string('redIdRed')->unique();
            $table->string('redDescripcion');
            $table->boolean('redTipoRecurso');
            $table->string('idMateria');
            //$table->string('files');
            $table->foreign('idMateria')->references('matIdMateria')->on('materias');
            $table->string('imagen');
            
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
        Schema::dropIfExists('reds');
    }
};
