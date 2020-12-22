<?php

namespace App\Models\Play\Orders;

use App\Enums\Play\UnitTypeEnum;
use App\Models\Contracts\OrderableInterface;
use App\Models\Play\Province;
use App\Models\Play\UnitOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use stdClass;

class Build extends Model implements OrderableInterface
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
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
        'location_id' => 'integer',
        'selected_for_resultion' => 'boolean',
        'unit_type' => UnitTypeEnum::class,
    ];


    public function unit(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function unitOrder(): MorphOne
    {
        return $this->morphOne(UnitOrder::class, 'orderable');
    }

    public function toOrderRequestDTO(): array
    {
        return  [
            $this->unit->province->short_name =>[
                "Type" => "Build",
                "Payload" => [
                    "Location" => $this->unit->province->short_name,
                    "From" => null,
                    "To" => null,
                    "Convoy" => null,
                    "Unit" => $this->type,
                ],
            ]
        ];
    }
}
