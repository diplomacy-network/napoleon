<?php

namespace App\Console\Commands;

use App\Actions\Play\AdvanceInstanceAction;
use App\Models\Play\AdjudicationInstance;
use App\Models\Play\UnitOrder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AdvanceInstanceWithRandomOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dip:advance-randomly {--id=: Adjudication instance id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Advance an instance randomly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $instance = AdjudicationInstance::findOrFail($this->option('id'));
        $phase = $instance->currentPhase();
        $phase->orders()->delete();

        // Assign random orders
        foreach ($phase->units as $unit) {
            $po = $unit->aggregateAllPossibleOrders();
            if ($po->count() > 0) {
            $order = $unit->aggregateAllPossibleOrders()->random();
                $uo = new UnitOrder();
                $uo->orderable_id = $order->id;
                $uo->orderable_type = $order::class;
                $uo->unit_id = $unit->id;
                $uo->save();
            }
        }

        app(AdvanceInstanceAction::class)->execute($instance);
    }
}
