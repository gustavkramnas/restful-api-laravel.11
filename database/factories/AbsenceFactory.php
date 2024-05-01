<?php

namespace Database\Factories;

use App\Models\AbsenceModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsenceFactory extends Factory
{
      protected $model = AbsenceModel::class;

      public function definition() //slumpmässig data 
      {
            return [
                  'employee_id' => $this->faker->unique()->numberBetween(1000, 9999),
                  'date' => $this->faker->date(),
                  'reason' => $this->faker->sentence,
                  'absence_type' => $this->faker->randomElement(['sjukfrånvaro', 'semester']),
                  'medical_certificate' => $this->faker->boolean,
                  'medical_certificate_photos' => [],
                  'approval_by' => $this->faker->name,
                  'approval_date' => $this->faker->date(),
                  'comments' => $this->faker->paragraph,
            ];
      }
}
