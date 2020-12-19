<?php

namespace Tests\Feature\Jobs\Playground;

use App\Jobs\Playground\CreateBranch;
use App\Models\Playground\Playground;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CreateBranchTest extends TestCase
{
    protected Playground $playground;

    public function setUp(): void{
        parent::setUp();
        Artisan::call('migrate:fresh');
        $this->playground = Playground::factory()->create();
        CreateBranch::dispatch($this->playground, 'main', false, null);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBelongsToPlayground()
    {
        
        $u = User::factory()->create();
        $this->assertDatabaseCount('users', 1);
    }
}
