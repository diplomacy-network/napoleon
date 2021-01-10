<?php


namespace App\Utility\OrderParser;


use App\Models\Contracts\OrderableInterface;
use App\Models\Play\Phase;
use App\Models\Play\Unit;
use JetBrains\PhpStorm\Pure;

class ShortOrderParser
{
    public Phase $phase;
    private function __construct(Phase $phase){
        $this->phase = $phase;
    }

    #[Pure]
    public static function forPhase(Phase $phase): self{
        return new ShortOrderParser($phase);
    }

    public function orderable(string $order): OrderableInterface {
        $parts = explode(' ', $order);
        var_dump($parts);
    }

    private function findUnit(string $type_short, string $province): Unit{
        Unit::where('phase_id', $this->phase->id)->where('province_id', function ($query) use ($province){
//            $query->select('id')->from('provinces')->where()
        });
    }

}