<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;
use App\Models\Patient;
use App\Models\Dentist;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = Patient::factory()->create();
        $dentist = Dentist::factory()->create();

        //genero N tratamientos y se los asigno a tal paciente y tal dentista
        $treatments = Treatment::factory()
            ->count(2)
            ->for($patient) //relacion muchos a uno
            ->for($dentist)
            ->create();
    }
}
