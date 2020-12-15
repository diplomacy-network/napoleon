<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\BasePower;
use App\Models\Play\Power;
use App\Models\Play\User;

class PowerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Power::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'base_power_id' => BasePower::factory(),
            'user_id' => User::factory(),
            'adjudication_instance_id' => AdjudicationInstance::factory(),
        ];
    }
}
