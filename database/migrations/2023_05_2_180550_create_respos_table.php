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
        Schema::create('respos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('JC');
			$table->string('Prenom');
			$table->string('Nom');
			$table->string('Telephone', 10);
			$table->string('Fonction');
			$table->string('Adresse');
			$table->string('Email');
			$table->string('Password');
            $table->string('CNE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respos');
    }
};
