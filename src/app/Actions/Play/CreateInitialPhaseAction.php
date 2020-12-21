<?php


namespace App\Actions\Play;


use App\Actions\Play\Adjudicator\ParsePhaseFromDataAction;
use App\Actions\Play\Adjudicator\ParsePhaseProvinceDataAction;
use App\Actions\Play\Adjudicator\ParseUnitOrdersAction;
use App\Actions\Play\Adjudicator\ParseUnitProvinceDataAction;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Phase;
use App\Utility\Adjudicator\AdjudicatorInterface;

class CreateInitialPhaseAction
{
    public function __construct(public AdjudicatorInterface $adjudicator)
    {
    }

    public function execute(AdjudicationInstance $instance): Phase
    {
        if ($instance->phases()->exists()) {
            throw new \Exception("Cannot create initial phase. This adjudication instance already has a phase.");
        }
        $init = $this->adjudicator->getInit($instance->variant->adjudication_name);
        app(BuildFreshAdjudicatableInstanceAction::class)->execute($instance);
        $phase = app(ParsePhaseFromDataAction::class)->execute($instance, $init);
        app(ParsePhaseProvinceDataAction::class)->execute($phase, $init);
        app(ParseUnitProvinceDataAction::class)->execute($phase, $init);
        app(ParseUnitOrdersAction::class)->execute($phase, $init);
        return $phase;


    }
}