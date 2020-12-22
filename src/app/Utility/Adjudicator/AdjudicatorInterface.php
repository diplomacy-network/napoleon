<?php

namespace App\Utility\Adjudicator;

interface AdjudicatorInterface {
    public static function getMeta(string $name): \stdClass;
    public static function getInit(string $name): \stdClass;
    public static function getAdjudicated(string $name, string $data): \stdClass;
}
