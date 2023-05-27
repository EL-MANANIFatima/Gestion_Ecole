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
        Schema::create('controles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->foreignId('Mat_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->foreignId('Niv_id')->references('id')->on('niveaux')->onDelete('cascade');
            $table->foreignId('Classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreignId('Prof_id')->references('id')->on('profs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controles');
    }
};
