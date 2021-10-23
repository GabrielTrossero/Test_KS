<?php

namespace Database\Factories;

use App\Models\Treatment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dentist;
use App\Models\Patient;

class TreatmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Treatment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dentist_id' => Dentist::factory(),
            'patient_id' => Patient::factory(),
            'plates' => $this->faker->randomDigit(),
            'updated_at' => null,
        ];
    }
}
