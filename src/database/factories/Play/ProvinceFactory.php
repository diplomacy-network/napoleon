<?php

namespace Database\Factories\Play;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Province;
use App\Models\Play\Variant;

class ProvinceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Province::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'variant_id' => Variant::factory(),
            'short_name' => $this->faker->word,
            'is_supply_center' => $this->faker->boolean,
        ];
    }
}
