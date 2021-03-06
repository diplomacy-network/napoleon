<?php


namespace App\Actions\Play\Adjudicator;


use App\Enums\Play\PhaseTypeEnum;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Phase;
use Illuminate\Support\Facades\Log;
use stdClass;

class ParsePhaseFromDataAction
{
    public function execute(AdjudicationInstance $instance, stdClass $data, Phase $previous = null): Phase{
        $phase = new Phase();
        $phase->season = $data->Season;
        $phase->adjudication_instance_id = $instance->id;
        $phase->year = $data->Year;
        $phase->type = PhaseTypeEnum::make($data->Type);
        $phase->started_at = now();
        $phase->length = null; // TODO: Change this, if it is a game
        $phase->adjudicated = false;
        $phase->previous_phase_id = $previous?->id;
        $phase->save();
        return $phase;
    }
}