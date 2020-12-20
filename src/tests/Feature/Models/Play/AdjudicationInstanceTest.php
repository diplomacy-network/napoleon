<?php

namespace Tests\Feature\Models\Play;

use App\Actions\Play\Adjudicator\CreateInitialPhaseAction;
use App\Actions\Play\CreateAdjudicationInstanceAction;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Phase;
use App\Models\Play\Variant;
use App\Models\Playground\Branch;
use App\Models\Playground\Playground;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdjudicationInstanceTest extends TestCase
{
//    use RefreshDatabase;
    public function testGetCurrentPhase()
    {
        $branch = Branch::factory()->create();
        $instance = app(CreateAdjudicationInstanceAction::class)->execute($branch, Variant::factory()->create());
        $first = Phase::factory()->adjudicated()->instance($instance)->create();
        $second = Phase::factory()->unadjudicated()->instance($instance)->create();
        $this->assertTrue($instance->currentPhase()->is($second));
    }
}
