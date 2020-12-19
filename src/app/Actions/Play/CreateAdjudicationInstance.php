<?php


namespace App\Actions\Play;


use App\Exceptions\Play\AdjudicatableAlreadyHasAnAdjudicationInstanceException;
use App\Models\Contracts\AdjudicatableInterface;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Variant;
use App\Models\Playground\Playground;

class CreateAdjudicationInstance
{
    public function execute(AdjudicatableInterface $adjudicatable, Variant $variant): AdjudicationInstance{
        if($adjudicatable->adjudicationInstance()->exists()){
            throw new AdjudicatableAlreadyHasAnAdjudicationInstanceException();
        }
        return $adjudicatable->adjudicationInstance()->create(['variant_id' => $variant->id]);
    }
}