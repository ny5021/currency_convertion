<?php

namespace Database\Factories;

use App\Models\Devises;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paires>
 */
class PairesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from_devise' => Devises::all()->random()->name,
            'to_devise' => Devises::all()->random()->name,
            'value' => $this->faker->randomElement([1.5, 3, 2.2]),
            'nb_converter' => 0,
        ];
    }
}
