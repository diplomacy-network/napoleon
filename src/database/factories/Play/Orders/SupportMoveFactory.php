<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Orders\Province;
use App\Models\Play\Orders\SupportMove;
use App\Models\Play\Orders\Unit;

class SupportMoveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupportMove::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_id' => Unit::factory(),
            'location_id' => Province::factory(),
            'from_id' => Province::factory(),
            'to_id' => Province::factory(),
            'selected_for_resultion' => $this->faker->boolean,
        ];
    }
}
