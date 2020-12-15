<?php

namespace Database\Seeders;

use App\Jobs\Play\Adjudicator\ReadVariantProvinces;
use App\Models\Play\Variant;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variant = new Variant();
        $variant->name = "Classical";
        $variant->adjudication_name = "Classical";
        $variant->scs_to_win = 18;
        $variant->save();
        ReadVariantProvinces::dispatchSync($variant);
    }
}
