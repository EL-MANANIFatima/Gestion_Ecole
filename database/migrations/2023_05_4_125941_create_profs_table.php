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
        Schema::create('profs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nom');
			$table->string('Prenom');
			$table->string('Email');
			$table->string('Password');
			$table->string('Adresse');
			$table->string('Telephone');
			$table->integer('Mat_id')->unsigned();
			$table->integer('Genre_id')->unsigned();
			$table->string('CNE');
			$table->string('JC');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profs');
    }
};
