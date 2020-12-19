<?php

namespace Tests\Feature\Actions\Playground;

use App\Actions\Playground\CreateBranchAction;
use App\Actions\Playground\CreatePlaygroundAction;
use App\Exceptions\Playground\BranchSlugAlreadyExistsForUser;
use App\Exceptions\Playground\PlaygroundSlugAlreadyExistsForUser;
use App\Jobs\Playground\CreateBranch;
use App\Models\Play\Variant;
use App\Models\Playground\Branch;
use App\Models\Playground\Playground;
use App\Models\User;
use Database\Seeders\VariantSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateBranchTest extends TestCase
{
    public string $name;
    public User $user1;
    public User $user2;
    public Playground $playground1;
    public Playground $playground2;
    public bool $public;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh --env=testing');
        $this->name = "main";
        $this->user1 = User::factory()->create();
        $this->user2 = User::factory()->create();
        $this->playground1 = Playground::factory(['user_id' => $this->user1->id])->create();
        $this->playground2 = Playground::factory(['user_id' => $this->user2->id])->create();
    }


    public function testUserCanCreateWhenSlugIsNotPresentForUser()
    {
        $branch = app(CreateBranchAction::class)->execute($this->playground1, $this->name);
        $this->assertDatabaseHas('branches', [
            'playground_id' => $this->playground1->id,
            'public' => false,
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);
        $this->playground1->refresh();
        $this->assertTrue($this->playground1->branches->contains($branch));

        $this->assertDatabaseCount('branches', 1);
    }

    public function testUserCannotCreateWhenSlugIsPresentForUser()
    {
        Branch::factory([
            'playground_id' => $this->playground1->id,
            'public' => false,
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'created_from_phase_id' => null,
        ])->create();
        $this->assertDatabaseCount('branches', 1);
        $this->expectException(BranchSlugAlreadyExistsForUser::class);
        app(CreateBranchAction::class)->execute($this->playground1, $this->name);
        $this->assertDatabaseCount('branches', 1);
    }


    public function testAnotherUserMayHaveAPlaygroundUnderSameSlug()
    {
        Branch::factory([
            'playground_id' => $this->playground1->id,
            'public' => false,
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ])->create();
        app(CreateBranchAction::class)->execute($this->playground2, $this->name);
        $this->assertDatabaseHas('branches', [
            'playground_id' => $this->playground2->id,
            'public' => false,
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);
        $this->assertDatabaseCount('branches', 2);
    }
}
