<?php


namespace App\Actions\Play;


use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Power;
use App\Models\Play\Variant;
use App\Models\User;
use App\Utility\Adjudicator\AdjudicatorInterface;

class BuildFreshAdjudicatableInstanceAction
{
    public function execute(AdjudicationInstance $instance, User $user){
        // From variant
        foreach ($instance->variant->basePowers as $bp){
            $power = new Power();
            $power->user_id = $user?->id;
            $power->adjudication_instance_id = $instance->id;
            $power->base_power_id = $bp->id;
            $power->save();
        }


    }
}