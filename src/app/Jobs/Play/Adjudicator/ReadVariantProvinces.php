<?php

namespace App\Jobs\Play\Adjudicator;

use App\Models\Play\Province;
use App\Models\Play\ProvinceName;
use App\Models\Play\Variant;
use App\Utility\Adjudicator\AdjudicatableInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReadVariantProvinces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Variant $variant;

    /**
     * Create a new job instance.
     *
     * @param  \App\Models\Play\Variant  $variant
     */
    public function __construct(Variant $variant)
    {
        $this->variant = $variant;
    }

    /**
     * Execute the job.
     *
     * @param  \App\Utility\Adjudicator\AdjudicatableInterface  $adjudicator
     * @return void
     */
    public function handle(AdjudicatableInterface $adjudicator)
    {
        $meta = $adjudicator->getMeta($this->variant->adjudication_name);
        foreach ($meta->Provinces as $short => $long) {
            $province = new Province();
            $province->short_name = $short;
            $province->variant_id = $this->variant->id;
            $province->save();
            $n = new ProvinceName();
            $n->province_id = $province->id;
            $n->language = "en_GB";
            $n->long_name = $long;
            $n->save();
        }
    }
}
