<?php

namespace App\Enums\Play;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\Enum\Laravel\Enum;

/**
 * Class PhaseTypeEnum
 * @package App\Enums\Play
 *
 * @method static self MOVEMENT()
 * @method static self RETREAT()
 * @method static self ADJUSTMENT()
 */
final class PhaseTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            "MOVEMENT" => "Movement",
            "RETREAT" => "Retreat",
            "ADJUSTMENT" => "Adjustment",
        ];
    }
}
