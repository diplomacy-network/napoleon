<?php

namespace Database\Factories\Play;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Phase;

class PhaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'adjudication_instance_id' => AdjudicationInstance::factory(),
            'season' => $this->faker->word,
            'year' => $this->faker->word,
            'type' => $this->faker->word,
            'started_at' => $this->faker->dateTime(),
            'length' => $this->faker->numberBetween(-10000, 10000),
            'adjudicated' => $this->faker->boolean,
            'next_phase_id' => Phase::factory(),
        ];
    }
}
