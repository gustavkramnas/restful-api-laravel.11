<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AbsenceModel;

class AbsenceSeeder extends Seeder
{
      //run the seeder
      public function run()
      {
            // Skapa 9 frånvarorapporter med hjälp av fabriken och spara dem i databasen
            AbsenceModel::factory()->count(9)->create();
      }
}
