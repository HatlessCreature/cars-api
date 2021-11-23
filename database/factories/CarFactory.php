<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;

class CarFactory extends Factory
{
    protected $model = Car::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->words(2, true),
            'model' => $this->faker->word(),
            'year' => intval($this->faker->year()),
            'max_speed' => $this->faker->randomFloat(0, 30, 300),
            'is_automatic' => $this->faker->boolean(),
            'engine' => 'petrol',
            'number_of_doors' => $this->faker->randomFloat(0, 2, 9)
        ];
    }
}
