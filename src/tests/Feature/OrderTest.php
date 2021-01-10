<?php

namespace Tests\Feature;

use App\Actions\Play\AdvanceInstanceAction;
use App\Actions\Play\CreateAdjudicationInstanceAction;
use App\Actions\Play\CreateInitialPhaseAction;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Orders\Move;
use App\Models\Play\Phase;
use App\Models\Play\Province;
use App\Models\Play\UnitOrder;
use App\Models\Play\Variant;
use App\Models\Playground\Branch;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public AdjudicationInstance $instance;

    public function setUp(): void {
        parent::setUp();
        Artisan::call("migrate:fresh --env=testing");
        $this->seed(DatabaseSeeder::class);
        $variant = Variant::where('adjudication_name', 'Classical')->firstOrFail();
        $branch = Branch::factory()->create();
        $this->instance = app(CreateAdjudicationInstanceAction::class)->execute($branch, $variant);
        app(CreateInitialPhaseAction::class)->execute($this->instance);
    }

    public function testMove()
    {
        // A Par - Bur
        $phase = $this->instance->currentPhase('adjudicationInstance.variant.provinces');
        $unit = $phase->unitInProvince($this->getProvince($phase, 'par'));
        $target = $this->getProvince($phase, 'bur');
        $move = Move::where('unit_id', $unit->id)->where('to_id', $target->id)->firstOrFail();
        UnitOrder::create([
            'unit_id' => $unit->id,
            'orderable_id' => $move->id,
            'orderable_type' => $move::class,
        ]);
        $phase = app(AdvanceInstanceAction::class)->execute($this->instance);
        $this->assertDatabaseHas('units', [
            'phase_id' => $phase->id,
            'power_id' => $unit->power_id,
            'province_id' => $target->id,
            'type' => $unit->type->value,
        ]);
    }



    private function getProvince(Phase $phase, string $name): Province {
        return $phase->adjudicationInstance->variant->provinces()->where('short_name', $name)->firstOrFail();
    }



}
