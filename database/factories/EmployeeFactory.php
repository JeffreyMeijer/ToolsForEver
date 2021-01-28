<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naam' => $this->faker->name,
            'positie' => $this->faker->jobTitle,
            'beschrijving' => $this->faker->text(80),
            'afbeelding' => $this->faker->image(public_path('storage/employee_photos')),
        ];
    }
}
