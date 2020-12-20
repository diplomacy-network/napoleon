<?php


namespace App\Actions\Play\Adjudicator;


use App\Models\Play\Phase;
use stdClass;

class ParseUnitOrdersAction
{
    public function execute(Phase $phase, stdClass $data)
    {
        foreach ($data->PossibleOrders as $province_string => $types){
            $province = $phase->adjudicationInstance->variant->provinces()->name($province_string)->first();

        }
    }
}