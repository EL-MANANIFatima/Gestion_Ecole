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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('Eleve_id')->references('id')->on('eleves')->onDelete('cascade');
            $table->foreignId('Prof_id')->references('id')->on('profs')->onDelete('cascade');
            $table->date('abs_date');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
