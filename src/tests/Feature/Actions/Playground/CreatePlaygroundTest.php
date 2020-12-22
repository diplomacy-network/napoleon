<?php

namespace Tests\Feature\Actions\Playground;

use App\Actions\Playground\CreatePlaygroundAction;
use App\Exceptions\Playground\PlaygroundSlugAlreadyExistsForUser;
use App\Jobs\Playground\CreateBranch;
use App\Models\Play\Variant;
use App\Models\Playground\Playground;
use App\Models\User;
use Database\Seeders\VariantSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreatePlaygroundTest extends TestCase
{
    public string $name;
    public User $user1;
    public User $user2;
    public Variant $variant;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh --env=testing');
        $this->name = "Tränen der Verdammnis";
        $this->seed(VariantSeeder::class);
        $this->variant = Variant::where('name', 'Classical')->firstOrFail();
        $this->user1 = User::factory()->create();
        $this->user2 = User::factory()->create();
    }


    public function testUserCanCreateWhenSlugIsNotPresentForUser()
    {
        $playground = app(CreatePlaygroundAction::class)->execute($this->user1, $this->name);
        $this->assertDatabaseHas('playgrounds', [
            'user_id' => $this->user1->id,
            'slug' => Str::slug($this->name),
            'name' => $this->name,
        ]);
        $this->user1->refresh();
        $this->assertTrue($this->user1->playgrounds->contains($playground));

        $this->assertDatabaseCount('playgrounds', 1);
    }

    public function testUserCannotCreateWhenSlugIsPresentForUser()
    {
        Playground::factory([
            'user_id' => $this->user1->id,
            'slug' => Str::slug($this->name),
            'name' => $this->name,
        ])->create();
        $this->assertDatabaseCount('playgrounds', 1);
        $this->assertTrue($this->user1->playgrounds()->where('slug', 'tranen-der-verdammnis')->exists());
        $this->expectException(PlaygroundSlugAlreadyExistsForUser::class);
        app(CreatePlaygroundAction::class)->execute($this->user1, $this->name);
        $this->assertDatabaseCount('playgrounds', 1);
    }


    public function testAnotherUserMayHaveAPlaygroundUnderSameSlug()
    {
        Playground::factory([
            'user_id' => $this->user1->id,
            'slug' => Str::slug($this->name),
            'name' => $this->name,
        ])->create();
        app(CreatePlaygroundAction::class)->execute($this->user2, $this->name);
        $this->assertDatabaseHas('playgrounds', [
            'user_id' => $this->user2->id,
            'slug' => Str::slug($this->name),
            'name' => $this->name,
        ]);
        $this->assertDatabaseCount('playgrounds', 2);
    }
}
