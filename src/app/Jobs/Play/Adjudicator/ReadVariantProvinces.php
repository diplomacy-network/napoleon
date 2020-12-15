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

    public AdjudicatableInterface $adjudicator;
    public Variant $variant;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AdjudicatableInterface $adjudicatableInterface, Variant $variant)
    {
        $this->variant = $variant;
        $this->adjudicator = $adjudicatableInterface;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $meta = $this->adjudicator->getMeta($this->variant->adjudication_name);
        var_dump($meta);
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
