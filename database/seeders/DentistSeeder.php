<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dentist;

class DentistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dentist::factory()
            ->count(1)
            ->hasTreatment(2) //relacion "uno a muchos"
            ->create();
    }
}
