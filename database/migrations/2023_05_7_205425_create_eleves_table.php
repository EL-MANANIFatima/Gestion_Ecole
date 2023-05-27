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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('Genre_id')->unsigned();
            $table->foreign('Genre_id')->references('id')->on('genre')->onDelete('cascade');
            $table->date('Date_Naiss');
            $table->bigInteger('Niv_id')->unsigned();
            $table->foreign('Niv_id')->references('id')->on('niveaux')->onDelete('cascade');
            $table->bigInteger('Classe_id')->unsigned();
            $table->foreign('Classe_id')->references('id')->on('Classes')->onDelete('cascade');
            $table->bigInteger('Respo_id')->unsigned();
            $table->foreign('Respo_id')->references('id')->on('resposables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
