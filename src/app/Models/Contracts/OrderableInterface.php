<?php


namespace App\Models\Contracts;


use stdClass;

interface OrderableInterface
{
    public function toOrderRequestDTO(): array;
}