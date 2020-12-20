<?php


namespace App\Actions\Play\Adjudicator;


use App\Enums\Play\PhaseTypeEnum;
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
        return app(CreatePhaseFromDataAction::class)->execute($instance, null, $init);



    }
}