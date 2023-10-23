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
        Schema::create('competencias', function (Blueprint $table) {
            $table->id();
            $table->string('identificador')->unique();
            $table->date('fecha');
            $table->unsignedInteger('duracion');
            //$table->foreignId('asesor_id')->constrained();

            $table->unsignedBigInteger('asesor_id'); //--> crear columna dentro de la tabla competencias
 
            $table->foreign('asesor_id')->references('id')->on('asesores'); //--> referenciar columna de ID dentro de la tabla competencias 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencias');
    }
};
