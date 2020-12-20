<?php

namespace Tests\Feature\Actions\Play;

use App\Actions\Play\CreateAdjudicationInstanceAction;
use App\Models\Play\Variant;
use App\Models\Playground\Branch;
use App\Models\Playground\Playground;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CreateAdjudicationInstanceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh --env=testing');
    }


    public function testCanCreateInstanceFromBranch(): void
    {
        $variant = Variant::factory()->create();
        $branch = Branch::factory()->create();
        $instance = app(CreateAdjudicationInstanceAction::class)->execute($branch, $variant);
        $branch->refresh();
        $this->assertTrue($instance->adjudicatable->is($branch));
        $this->assertTrue($instance->variant->is($variant));
    }
}
