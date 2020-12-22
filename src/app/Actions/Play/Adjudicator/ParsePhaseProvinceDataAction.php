<?php


namespace App\Actions\Play\Adjudicator;


use App\Models\Play\Influence;
use App\Models\Play\Phase;
use stdClass;

class ParsePhaseProvinceDataAction
{
    public function execute(Phase $phase, stdClass $data)
    {
        $phase_id = $phase->id;
        $powers = $phase->adjudicationInstance->powers()->with('basePower')->get();
        $provinces = $phase->adjudicationInstance->variant->provinces;
        foreach ($data->Influence as $province_string => $power_string) {
            $influence = new Influence();
            $influence->province_id = $provinces->where('short_name', $province_string)->first()->id;
            $influence->power_id = $powers->where('basePower.name', $power_string)->first()->id;
            $influence->is_supply_center = isset($data->SupplyCenters->$province_string);
            $influence->phase_id = $phase_id;
            $influence->save();
        }
    }
}