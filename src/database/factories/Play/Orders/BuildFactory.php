<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Orders\Build;
use App\Models\Play\Orders\Province;

class BuildFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Build::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(["army","fleet"]),
            'location_id' => Province::factory(),
            'selected_for_resultion' => $this->faker->boolean,
        ];
    }
}
