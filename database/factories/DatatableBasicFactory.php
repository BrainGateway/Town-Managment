<?php

namespace Database\Factories;

use App\Models\DatatableBasic;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatatableBasicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DatatableBasic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'amount' => $this->faker->numberBetween($min = 10000, $max = 999999),
            'color' => $this->faker->randomElement(['red', 'green', 'blue']),
        ];
    }
}
