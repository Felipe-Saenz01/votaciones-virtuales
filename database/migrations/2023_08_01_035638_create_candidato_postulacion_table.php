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
        Schema::create('candidato_postulacion', function (Blueprint $table) {
            $table->id();
            //relaciones
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('postulacion_id');
            // $table->foreignId('candidato_id')->constrained('candidatos');
            // $table->foreignId('postulacion_id')->constrained('postulaciones');
            //campos pivote
            $table->integer('numero_plancha');
            $table->integer('cantidad_votos')->default(0);
            
            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->foreign('postulacion_id')->references('id')->on('postulacions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidato_postulacion');
    }
};
