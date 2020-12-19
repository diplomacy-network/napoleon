<?php


namespace App\Actions\Play;


use App\Exceptions\Play\AdjudicatableAlreadyHasAnAdjudicationInstanceException;
use App\Models\Contracts\AdjudicatableInterface;
use App\Models\Play\AdjudicationInstance;
use App\Models\Playground\Playground;

class CreateAdjudicationInstance
{
    public function execute(AdjudicatableInterface $adjudicatable): AdjudicationInstance{
        if($adjudicatable->adjudicationInstance()->exists()){
            throw new AdjudicatableAlreadyHasAnAdjudicationInstanceException();
        }
        $instance = new AdjudicationInstance();
       $adjudicatable->adjudicationInstance()->save($instance);
       return $instance;
    }
}