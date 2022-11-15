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
        Schema::create('red_grupos', function (Blueprint $table) {
            $table->id();
            $table->boolean('habilitado');
            $table->string('redIdRed');
            $table->foreign('redIdRed')->references('redIdRed')->on('reds');
            $table->string('gruIdGrupo');
            $table->foreign('gruIdGrupo')->references('gruIdGrupo')->on('grupos');
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
        Schema::dropIfExists('red_grupos');
    }
};
