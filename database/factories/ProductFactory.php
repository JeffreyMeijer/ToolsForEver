<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artikel' => $this->faker->name,
            'voorraad' => $this->faker->numberBetween(1,100),
            'beschrijving' => $this->faker->text(80),
            'afbeelding' => $this->faker->image(public_path('storage/product_photos')),
        ];
    }
}
