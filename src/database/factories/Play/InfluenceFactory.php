<?php

namespace Database\Factories\Play;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Influence;
use App\Models\Play\Phase;
use App\Models\Play\Power;
use App\Models\Play\Province;

class InfluenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Influence::class;

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
        ];
    }
}
