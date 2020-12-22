<?php

namespace Database\Factories\Play;

use App\Models\Playground\Playground;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Power;

class AdjudicationInstanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdjudicationInstance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'winning_power_id' => Power::factory(),
        ];
    }

    public function playground(): AdjudicationInstanceFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'adjudicatable_id' => Playground::factory(),
            ];
        });
    }
}
