<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(1)
            ->hasPatient(1) //relacion "uno a muchos" (en este caso siempre va a ser "uno a uno")
            ->create();
    }
}
