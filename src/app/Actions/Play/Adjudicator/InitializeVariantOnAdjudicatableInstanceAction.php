<?php


namespace App\Actions\Play\Adjudicator;


use App\Utility\Adjudicator\AdjudicatorInterface;

class InitializeVariantOnAdjudicatableInstanceAction
{

    public function __construct(
        public AdjudicatorInterface $adjudicator
    )
    {
    }

    public function execute(){

    }
}