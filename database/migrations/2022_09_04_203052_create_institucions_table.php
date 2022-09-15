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
        Schema::create('institucions', function (Blueprint $table) {
            $table->id();
            $table->string('insNombre');
            $table->string('codigoNit')->unique();
            $table->string('insDireccion');
            $table->string('insDepartamento');
            $table->string('insPais');
            $table->string('insTelefono');
            $table->string('insCalendario');
            $table->integer('insCantidadDocentes');
            $table->integer('insCantidadEstudiantes');
            $table->boolean('completo');
            $table->boolean('dea');
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
        Schema::dropIfExists('institucions');
    }
};
