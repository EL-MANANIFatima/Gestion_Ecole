<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Matiere;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Mats = [
            ['en'=> 'Arabic', 'ar'=> 'عربي','fr'=>'Arabe'],
            ['en'=> 'Sciences', 'ar'=> ' علوم الحياة و الارض','fr'=>'SVT'],
            ['en'=> 'Physics', 'ar'=> 'فيزياء','fr'=>'Physique'],
            ['en'=> 'English', 'ar'=> 'انجليزية','fr'=>'Anglais'],
            ['en'=> 'French', 'ar'=> 'فرنسية','fr'=>'Francais'],
            ['en'=> 'Maths', 'ar'=> 'رياضيات','fr'=>'Mathematique'],
            ['en'=> 'History', 'ar'=> 'اجتماعيات','fr'=>'Histoire Geo'],
            ['en'=> 'PS', 'ar'=> 'رياضة','fr'=>'ES'],
            ['en'=> 'Communication', 'ar'=> 'xhi 7aja','fr'=>'Communication'],   
        ];
        foreach ($Mats as $mat) {
            Matiere::create(['libelle' => $mat]);
        }
    }
}
