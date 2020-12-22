<?php


namespace App\Actions\Playground;


use App\Exceptions\Playground\BranchSlugAlreadyExistsForUser;
use App\Exceptions\Playground\PlaygroundSlugAlreadyExistsForUser;
use App\Models\Play\Phase;
use App\Models\Playground\Branch;
use App\Models\Playground\Playground;
use Illuminate\Support\Str;

class CreateBranchAction
{
    public function execute(Playground $playground, string $name = 'main', bool $public = false, Phase $basePhase = null ): Branch
    {
        $slug = Str::slug($name);
        $playground->refresh();
        if($playground->branches()->where('slug', $slug)->exists()){
            throw new BranchSlugAlreadyExistsForUser();
        }
        $branch = new Branch();
        $branch->slug = $slug;
        $branch->name = $name;
        $branch->playground_id = $playground->id;
        $branch->created_from_phase_id = $basePhase?->id;
        $branch->public = $public;
        $branch->save();
        return $branch;
    }

}