<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Province;
use App\Models\Play\ProvinceNames;

class ProvinceNamesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProvinceNames::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'province_id' => Province::factory(),
            'long_name' => $this->faker->word,
            'language' => $this->faker->randomElement(["de_DE","en_GB"]),
        ];
    }
}
