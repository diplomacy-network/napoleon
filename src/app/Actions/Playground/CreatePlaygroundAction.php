<?php

namespace App\Actions\Playground;

use App\Models\Playground\Playground;
use App\Models\User;

class CreatePlaygroundAction {
    public function __construct(
        public User $user,
        public string $name
    )
    {}

    public function __invoke() {
    
    }
}
