<?php


namespace App\Actions\Play\Adjudicator;


use App\Enums\Play\UnitTypeEnum;
use App\Models\Play\Orders\Build;
use App\Models\Play\Orders\Convoy;
use App\Models\Play\Orders\Disband;
use App\Models\Play\Orders\Hold;
use App\Models\Play\Orders\Move;
use App\Models\Play\Orders\SupportHold;
use App\Models\Play\Orders\SupportMove;
use App\Models\Play\Phase;
use Illuminate\Support\Facades\Log;
use stdClass;

class ParseUnitOrdersAction
{
    public function execute(Phase $phase, stdClass $data)
    {
        $provinces = $phase->adjudicationInstance->variant->provinces();
        // TODO: Fail if phase has no units (really???)
        // TODO: Make transaction
        foreach ($data->PossibleOrders as $province_string => $types){
            /** @var \App\Models\Play\Province $province */
            $province = (clone $provinces)->name($province_string)->first();
            foreach ($types->Moves ?? [] as $movement) {
                $unit = (clone $phase)->unitInProvince($province);
                $move = new Move();
                $move->unit_id = $unit->id;
                $move->to_id = (clone $provinces)->name($movement->To)->firstOrFail()->id;
                $move->save();
            }
            foreach ($types->SupportMoves ?? [] as $sm){
                $unit = (clone $phase)->unitInProvince($province);
                $support = new SupportMove();
                $support->unit_id = $unit->id;
                $support->from_id = (clone $provinces)->name($sm->From)->first()->id;
                $support->to_id = (clone $provinces)->name($sm->To)->first()->id;
                $support->save();
            }
            foreach ($types->SupportHolds ?? [] as $supportHold){
                $unit = (clone $phase)->unitInProvince($province);
                $sh = new SupportHold();
                $sh->unit_id = $unit->id;
                $sh->to_id = (clone $provinces)->name($supportHold->To)->first()->id;
                $sh->save();
            }
            foreach ($types->Convoy ?? [] as $convoy){
                $unit = (clone $phase)->unitInProvince($province);
                $c = new Convoy();
                $c->unit_id = $unit->id;
                $c->from_id = (clone $provinces)->name($convoy->From)->first()->id;
                $c->to_id = $province->names($convoy->To)->first()->id;
                $c->save();
            }
            foreach ($types->Builds ?? [] as $build) {
                $b = new Build();
                $b->location_id = $province->id;
                $b->phase_id = $phase->id;
                $b->type = UnitTypeEnum::make($build->Type);
                $b->save();
            }
            if(isset($types->Disbands->Location)) {
                $unit = (clone $phase)->unitInProvince($province);
                $d = new Disband();
                $d->unit_id = $unit->id;
                $d->save();
            }
            if(isset($types->Holds->Location)){
                $unit = (clone $phase)->unitInProvince($province);
                $h = new Hold();
                $h->unit_id = $unit->id;
                $h->save();
            }

        }
    }
}