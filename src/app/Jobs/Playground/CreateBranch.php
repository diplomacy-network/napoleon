<?php

namespace App\Jobs\Playground;

use App\Models\Play\AdjudicationInstance;
use App\Models\Play\Phase;
use App\Models\Playground\Branch;
use App\Models\Playground\Playground;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateBranch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Playground $playground;
    public string $name;
    public bool $public;
    public Phase $phase;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Playground $playground, string $name, bool $public, Phase $phase)
    {
        $this->playground = $playground;
        $this->name = $name;
        $this->public;
        $this->phase = $phase;
    }

    public static function fromRequest(){

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $branch = new Branch();
        $branch->name = $this->name;
        $branch->public = $this->public;
        $branch->created_from_phase_id = $this->phase?->id;
        $branch->save();

        
    }
}
