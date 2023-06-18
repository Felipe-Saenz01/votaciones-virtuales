<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->smallIncrements('idpostulacion');
            $table->date('fechaPostulacion');
            $table->unsignedBigInteger('idCuerpoColegiado');
            $table->string('resultadoElectoral', 15);
            $table->unsignedBigInteger('codigo_programa');
            $table->string('facultad', 150);
            $table->timestamps();

            $table->foreign('idCuerpoColegiado')->references('id')->on('cuerpo_colegiados');
            $table->foreign('codigo_programa')->references('id')->on('programa_academicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulaciones');
    }
};
