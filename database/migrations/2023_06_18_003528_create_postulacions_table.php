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
        Schema::create('postulacions', function (Blueprint $table) {
            $table->id();
            $table->date('fechaPostulacion');
            $table->foreignId('cuerpo_colegiado_id')->constrained('cuerpo_colegiados');
            $table->foreignId('programa_academico_id')->constrained('programa_academicos');
            $table->foreignId('calendario_electoral_id')->constrained('calendario_electorals');
            $table->string('resultadoElectoral', 15);
            $table->string('facultad', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulacions');
    }
};
