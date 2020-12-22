<?php

namespace App\Enums\Play;

use Spatie\Enum\Laravel\Enum;

/**
 * Class UnitTypeEnum
 * @package App\Enums\Play
 *
 * @method static self FLEET()
 * @method static self ARMY()
 * @method static self BUILDER()
 */
final class UnitTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            "FLEET" => "Fleet",
            "ARMY" => "Army",
            "BUILDER" => "Builder",
        ];
    }
}
