<?php

namespace Database\Seeders;

use App\Actions\Play\BuildFreshAdjudicatableInstanceAction;
use App\Actions\Play\CreateAdjudicationInstanceAction;
use App\Actions\Play\CreateInitialPhaseAction;
use App\Models\Play\Variant;
use App\Models\Playground\Branch;
use Illuminate\Database\Seeder;

class CreateRandomGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Variant $variant */
        $variant = Variant::inRandomOrder()->first();
        $branch = Branch::factory()->create();
        $instance = app(CreateAdjudicationInstanceAction::class)->execute($branch, $variant);
        app(CreateInitialPhaseAction::class)->execute($instance);
    }
}
