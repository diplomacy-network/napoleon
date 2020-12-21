<?php

namespace App\Models\Play\Orders;

use App\Enums\Play\UnitTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
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


    public function location()
    {
        return $this->belongsTo(\App\Models\Play\Province::class);
    }
}
