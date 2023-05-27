<?php

namespace Database\Seeders;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['en'=> 'Male', 'ar'=> 'ذكر','fr' => 'Male'],
            ['en'=> 'Female', 'ar'=> 'انثي','fr' => 'Femelle'],

        ];
        foreach ($genres as $genre) {
            Genre::create(['libelle' => $genre]);
        }
    }
}
