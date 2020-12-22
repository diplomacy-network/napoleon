<?php


namespace App\Actions\Play;


use App\Actions\Play\Adjudicator\ParsePhaseFromDataAction;
use App\Actions\Play\Adjudicator\ParsePhaseProvinceDataAction;
use App\Actions\Play\Adjudicator\ParseUnitOrdersAction;
use App\Actions\Play\Adjudicator\ParseUnitProvinceDataAction;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Phase;
use App\Utility\Adjudicator\AdjudicatorInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

// TODO: Test this action
class AdvanceInstanceAction
{
    public function __construct(public AdjudicatorInterface $adjudicator)
    {
    }

    public function execute(AdjudicationInstance $instance): Phase
    {
        $previous_phase = $instance->currentPhase();
        $data = $this->adjudicator->getAdjudicated($instance->variant->adjudication_name, json_encode($this->makeData($previous_phase)));
        $phase = app(ParsePhaseFromDataAction::class)->execute($instance, $data, $previous_phase);
        app(ParsePhaseProvinceDataAction::class)->execute($phase, $data);
        app(ParseUnitProvinceDataAction::class)->execute($phase, $data);
        app(ParseUnitOrdersAction::class)->execute($phase, $data);
        return $phase;


    }

    protected function makeData(Phase $phase): Collection{
        // Orders
        $unit_orders = $phase->orders()->with(['orderable', 'orderable.unit.province'])->get();
        $orders_collection = collect();
        foreach ($unit_orders as $o) {
            /** @var \App\Models\Contracts\OrderableInterface $order */
            $order = $o->orderable;
            $orders_collection = $orders_collection->merge($order->toOrderRequestDTO());
        }

        // Metadata
        $meta_collection = collect([
            "Season" => $phase->season,
            "Year" => $phase->year,
            "Type" =>$phase->type->value,
        ]);

        // Influence
        $influences = $phase->influences()->with(['power.basePower', 'province'])->get();
        $influence_collection = collect();
        foreach ($influences as $i) {
            $influence_collection = $influence_collection->merge(collect([
                $i->province->short_name => $i->power->basePower->name,
            ]));
        }

        // SCs
         $scs = $phase->influences()->with(['power.basePower', 'province'])->where('is_supply_center', true)->get();
        $sc_collection = collect();
        foreach ($scs as $s) {
            $sc_collection = $sc_collection->merge(collect([
                $s->province->short_name => $s->power->basePower->name,
            ]));
        }

        // Units
        $units = $phase->units()->with(['power.basePower'])->get();
        $unit_collection = collect();
        foreach ($units as $u){
            $unit_collection = $unit_collection->merge(collect([
                $u->province->short_name => [
                    "Type" => $u->type->value,
                    "Nation" => $u->power->basePower->name,
                ],
            ]));
        }


        Log::debug(json_encode($meta_collection->merge(collect([
            "Orders" => $orders_collection->toArray(),
            "Units" => $unit_collection->toArray(),
            "SupplyCenters" => $sc_collection->toArray(),
            "Influence" => $influence_collection->toArray(),
        ]))));
        return $meta_collection->merge(collect([
            "Orders" => $orders_collection->toArray(),
            "Units" => $unit_collection->toArray(),
            "SupplyCenters" => $sc_collection->toArray(),
            "Influence" => $influence_collection->toArray(),
        ]));

//        merge($unit_collection)->merge($orders_collection)->merge($influence_collection)->merge($sc_collection);
    }
}