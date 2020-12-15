<?php

namespace Database\Factories\Play\Orders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Orders\Disband;
use App\Models\Play\Orders\Province;
use App\Models\Play\Orders\Unit;

class DisbandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Disband::class;

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
            'selected_for_resultion' => $this->faker->boolean,
        ];
    }
}
