<?php


namespace App\Actions\Play;


use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Power;
use App\Models\User;

class BuildFreshAdjudicatableInstanceAction
{
    public function execute(AdjudicationInstance $instance, User $user = null)
    {
        // From variant
        foreach ($instance->variant->basePowers as $bp) {
            $power = new Power();
            $power->user_id = $user?->id;
            $power->adjudication_instance_id = $instance->id;
            $power->base_power_id = $bp->id;
            $power->save();
        }


    }
}