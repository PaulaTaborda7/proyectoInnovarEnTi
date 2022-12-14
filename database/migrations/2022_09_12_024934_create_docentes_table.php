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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('documentoIdentidad')->unique();
            $table->string('email');
            $table->string('tipo');
            $table->string('docTipoContrato');
            $table->string('docAreaCurricular');
            $table->string('insCodigoNit');
            $table->foreign('insCodigoNit')->references('codigoNit')->on('institucions');
            $table->string('idGrupo');
            $table->foreign('idGrupo')->references('gruIdGrupo')->on('grupos');
            $table->string('password');
            $table->string('password_confirmation');
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
        Schema::dropIfExists('docentes');
    }
};
