<?php

namespace Tests\Feature\Actions\Play;

use App\Actions\Play\BuildFreshAdjudicatableInstanceAction;
use App\Actions\Play\CreateAdjudicationInstanceAction;
use App\Actions\Play\CreateInitialPhaseAction;
use App\Models\Play\Variant;
use App\Models\Playground\Branch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CreateInitialPhaseActionTest extends TestCase
{
    public function setUp(): void {
        parent::setUp();
        Artisan::call('migrate:fresh --seed --env=testing');
    }

    public function testAction()
    {
        $variant = Variant::where('name', 'Classical')->firstOrFail();
        $branch = Branch::factory()->create();
        $instance = app(CreateAdjudicationInstanceAction::class)->execute($branch, $variant);
        $phase = app(CreateInitialPhaseAction::class)->execute($instance);
    }
}
