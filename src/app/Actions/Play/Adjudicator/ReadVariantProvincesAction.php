<?php


namespace App\Actions\Play\Adjudicator;


use App\Models\Play\Province;
use App\Models\Play\ProvinceName;
use App\Models\Play\Variant;
use App\Utility\Adjudicator\AdjudicatorInterface;

class ReadVariantProvincesAction
{
    public function __construct(
        public AdjudicatorInterface $adjudicator
    )
    {
    }

    public function execute(Variant $variant): Variant {
        $meta = $this->adjudicator->getMeta($variant->adjudication_name);
        foreach ($meta->Provinces as $short => $long) {
            $province = new Province();
            $province->short_name = $short;
            $province->variant_id = $variant->id;
            $province->save();
            $n = new ProvinceName();
            $n->province_id = $province->id;
            $n->language = "en_GB";
            $n->long_name = $long;
            $n->save();
        }
        return $variant;
    }
}