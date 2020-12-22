<?php

namespace App\Models\Play\Orders;

use App\Models\Contracts\OrderableInterface;
use App\Models\Play\UnitOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use stdClass;

class SupportMove extends Model implements OrderableInterface
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
        'from_id',
        'to_id',
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
        'from_id' => 'integer',
        'to_id' => 'integer',
        'selected_for_resultion' => 'boolean',
    ];


    public function unit()
    {
        return $this->belongsTo(\App\Models\Play\Unit::class);
    }

    public function from()
    {
        return $this->belongsTo(\App\Models\Play\Province::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(\App\Models\Play\Province::class, 'to_id');
    }

    public function unitOrder(): MorphOne
    {
        return $this->morphOne(UnitOrder::class, 'orderable');
    }

    public function toOrderRequestDTO(): array
    {
        return [
            $this->unit->province->short_name => [
                "Type" => "SupportMove",
                "Payload" => [
                    "Location" => $this->unit->province->short_name,
                    "From" => $this->from->short_name,
                    "To" => $this->to->short_name,
                    "Convoy" => null,
                    "Unit" => null,
                ],
            ]
        ];
    }
}
