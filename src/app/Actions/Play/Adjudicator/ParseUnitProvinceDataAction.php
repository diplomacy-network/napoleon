<?php


namespace App\Actions\Play\Adjudicator;


use App\Enums\Play\UnitTypeEnum;
use App\Models\Play\Phase;
use App\Models\Play\Unit;
use stdClass;

class ParseUnitProvinceDataAction
{
    public function execute(Phase $phase, stdClass $data){
        $provinces = $phase->adjudicationInstance->variant->provinces;
        $powers = $phase->adjudicationInstance->powers()->with('basePower')->get();
        foreach ($data->Units as $province_string => $object){
            $unit = new Unit();
            $unit->phase_id = $phase->id;
            $unit->power_id = $powers->where('basePower.name', $object->Nation)->first()->id;
            $unit->type = UnitTypeEnum::make($object->Type);
            $unit->province_id = $provinces->where('short_name', $province_string)->first()->id;
            $unit->save();
        }

    }
}