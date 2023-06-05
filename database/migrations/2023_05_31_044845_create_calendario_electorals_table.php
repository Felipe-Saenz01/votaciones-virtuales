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
        Schema::create('calendario_electorals', function (Blueprint $table) {
            $table->id('id');
            $table->string('concepto');
            $table->date('fechaInicial');
            $table->date('fechaFinal');
            $table->unsignedBigInteger('idPeriodoAcademico');
            $table->string('estado',10);
            $table->timestamps();

            $table->foreign('idPeriodoAcademico')->references('id')->on('periodo_academicos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario_electorals');
    }
};
