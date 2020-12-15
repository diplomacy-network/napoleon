<?php

namespace App\Utility\Adjudicator;

interface AdjudicatableInterface {
    public static function getMeta(string $name);
    public static function getInit(string $name): array;
    public static function getAdjudicated(string $name, mixed $data): array;
}
