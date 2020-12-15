<?php

namespace Database\Factories\Play;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Phase;
use App\Models\Play\Power;
use App\Models\Play\Province;
use App\Models\Play\Unit;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phase_id' => Phase::factory(),
            'power_id' => Power::factory(),
            'province_id' => Province::factory(),
            'type' => $this->faker->randomElement(["army","fleet"]),
        ];
    }
}
