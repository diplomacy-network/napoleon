<?php

namespace Database\Seeders;

use App\Actions\Play\CreateAdjudicationInstanceAction;
use App\Models\Play\Phase;
use App\Models\Play\Variant;
use App\Models\Playground\Branch;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CreateLogicalPhasesForCurrentPhaseViewTesting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $variant = Variant::factory()->create();

        for ($i = 0; $i < 10; $i++) {
            if($i % 20 == 0){
                $this->command->line($i);
            }
            $branch = Branch::factory()->create();
            $instance = app(CreateAdjudicationInstanceAction::class)->execute(
                $branch,
                $variant
            );
            Phase::factory()->count($faker->numberBetween(0, 100))->adjudicated()->instance($instance)->create();
            Phase::factory()->unadjudicated()->instance($instance)->create();
            $instance->refresh();
            $phases = $instance->phases()->orderByDesc('started_at')->get();
            for($j = 0; $j < count($phases) - 1; $j++ ){
                /** @var Phase $phase */
                $phase = $phases[$j];
                $phase->previous_phase_id = $phases[$j + 1]->id;
                $phase->save();
            }
        }


    }
}
