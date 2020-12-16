<?php

namespace App\Jobs\Playground;

use App\Models\Play\Phase;
use App\Models\Playground\Playground;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Request;
use Str;

class CreatePlayground implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public string $name;
    public User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $name, User $user)
    {
        $this->name = $name;
        $this->user = $user;
    }

    public static function fromRequest(){

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $slug = Str::slug("name");
        $playground = new Playground();
        $playground->name = $this->name;
        $playground->slug = $slug;
        $playground->user_id = $this->user->id;
        $playground->save();

    }
}
