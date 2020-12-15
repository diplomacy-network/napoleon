<?php

namespace Database\Factories\Play;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\Adjudicatable;
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
            'adjudicatable_id' => Adjudicatable::factory(),
            'adjudicatable_type' => $this->faker->word,
            'winning_power_id' => Power::factory(),
        ];
    }
}
