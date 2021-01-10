<?php


namespace App\Utility\OrderParser;


use App\Models\Contracts\OrderableInterface;
use App\Models\Play\Phase;

interface OrderParserInterface
{
    public static function forPhase(Phase $phase): self;

    public function orderable(string $order): OrderableInterface;
}