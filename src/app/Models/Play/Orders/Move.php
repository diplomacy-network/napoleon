<?php

namespace App\Models\Play\Orders;

use App\Models\Contracts\OrderableInterface;
use App\Models\Play\Province;
use App\Models\Play\Unit;
use App\Models\Play\UnitOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use stdClass;

class Move extends Model implements OrderableInterface
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
        'to_id' => 'integer',
        'selected_for_resultion' => 'boolean',
    ];


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function to()
    {
        return $this->belongsTo(Province::class, 'to_id');
    }

    public function unitOrder(): MorphOne
    {
        return $this->morphOne(UnitOrder::class, 'orderable');
    }

    public function toOrderRequestDTO(): array
    {
        return [
            $this->unit->province->short_name => [
                    "Type" => "Move",
                    "Payload" => [
                        "Location" => $this->unit->province->short_name,
                        "From" => null,
                        "To" => $this->to->short_name,
                        "Convoy" => null,
                        "Unit" => null,
                    ],
            ]
        ];
    }
}
