<?php

namespace App\Actions\Playground;

use App\Exceptions\Playground\PlaygroundSlugAlreadyExistsForUser;
use App\Models\Play\Variant;
use App\Models\Playground\Playground;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CreatePlaygroundAction {

    public function execute(User $user, string $name): Playground {
        $slug = Str::slug($name);
        $user->refresh();
        Log::debug("Started to create Playground", [
            'slug' => $slug,
            'id' => $user->id,
            'exists' => $user->playgrounds()->where('slug', $slug)->exists(),
        ]);
        if($user->playgrounds()->where('slug', $slug)->exists()){
            throw new PlaygroundSlugAlreadyExistsForUser;
        }
        $playground = new Playground();
        $playground->name = $name;
        $playground->slug = $slug;
        $playground->user_id = $user->id;
        $playground->save();
        return $playground;
    }
}
