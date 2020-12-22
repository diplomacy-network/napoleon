<?php


namespace App\Models\Contracts;


use Illuminate\Database\Eloquent\Relations\MorphOne;

interface AdjudicatableInterface
{
    function adjudicationInstance(): MorphOne;
}