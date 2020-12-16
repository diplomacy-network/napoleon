<?php

namespace App\Jobs\Play\Adjudicator;

use App\Models\Play\AdjudicationInstance;
use App\Utility\Adjudicator\AdjudicatableInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AdvanceAdjudicatableInstance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public AdjudicationInstance $instance;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AdjudicationInstance $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(AdjudicatableInterface $adjudicator)
    {
        
        
    }
}
