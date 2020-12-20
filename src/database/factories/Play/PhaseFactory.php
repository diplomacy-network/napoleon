<?php

namespace Database\Factories\Play;

use App\Enums\Play\PhaseTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Phase;
use Spatie\Enum\Laravel\Faker\FakerEnumProvider;

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
        $this->faker->addProvider(new FakerEnumProvider($this->faker));
        return [
            'adjudication_instance_id' => null,
            'season' => $this->faker->word,
            'year' => $this->faker->word,
            'type' => $this->faker->randomEnumValue(PhaseTypeEnum::class),
            'started_at' => $this->faker->dateTime(),
            'length' => $this->faker->numberBetween(0, 10000),
            'adjudicated' => $this->faker->boolean,
            'previous_phase_id' => null,
        ];
    }

    public function instance(AdjudicationInstance $instance) {
        return $this->state(function (array $attributes) use ($instance) {
            return [
                'adjudication_instance_id' => $instance->id,
            ];
        });
    }

    public function adjudicated(){
        return $this->state(function (array $attributes) {
            return [
                'adjudicated' => true,
                'started_at' => now()->subSeconds($this->faker->numberBetween(1,600)),
            ];
        });
    }

    public function unadjudicated(){
        return $this->state(function (array $attributes) {
            return [
                'adjudicated' => false,
                'started_at' => now()->subMinute(),
            ];
        });
    }
}
