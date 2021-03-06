<?php

namespace App\Models\Play\Orders;

use App\Models\Contracts\OrderableInterface;
use App\Models\Play\UnitOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use stdClass;

class Disband extends Model implements OrderableInterface
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'location_id',
        'selected_for_resultion',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'unit_id' => 'integer',
        'location_id' => 'integer',
        'selected_for_resultion' => 'boolean',
    ];


    public function unit()
    {
        return $this->belongsTo(\App\Models\Play\Unit::class);
    }

    public function unitOrder(): MorphOne
    {
        return $this->morphOne(UnitOrder::class, 'orderable');
    }

    public function toOrderRequestDTO(): array
    {
        return [
            $this->unit->province->short_name => [
                "Type" => "Disband",
                "Payload" => [
                    "Location" => $this->unit->province->short_name,
                    "From" => null,
                    "To" => null,
                    "Convoy" => null,
                    "Unit" => null,
                ],
            ]
        ];
    }
}
