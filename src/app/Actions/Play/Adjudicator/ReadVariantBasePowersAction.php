<?php


namespace App\Actions\Play\Adjudicator;


use App\Models\Play\BasePower;
use App\Models\Play\Variant;
use App\Utility\Adjudicator\AdjudicatorInterface;
use Illuminate\Support\Facades\Log;

class ReadVariantBasePowersAction
{
    public function __construct(
        public AdjudicatorInterface $adjudicator
    )
    {
    }

    public function execute(Variant $variant){
        $meta = $this->adjudicator->getMeta($variant->adjudication_name);
        foreach ($meta->Nations as $nation) {
            $bp = new BasePower();
            $bp->variant_id = $variant->id;
            $bp->name = $nation;
            $bp->save();
        }
    }
}