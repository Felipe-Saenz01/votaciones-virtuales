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
        Schema::create('programa_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_programa');
            $table->unsignedBigInteger('idFacultad');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('idFacultad')->references('id')->on('facultads');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programa_academicos');
    }
};
