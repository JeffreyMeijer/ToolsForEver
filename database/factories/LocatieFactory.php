<?php

namespace Database\Factories;

use App\Models\Locatie;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocatieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Locatie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naam' => $this->faker->city,
            'adres' => $this->faker->address,
            'postcode' => $this->faker->postcode,
        ];
    }
}
