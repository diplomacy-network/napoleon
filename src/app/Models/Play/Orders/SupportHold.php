<?php

namespace App\Models\Play\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportHold extends Model
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
        return $this->belongsTo(\App\Models\Play\Orders\Unit::class);
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Play\Orders\Province::class);
    }

    public function to()
    {
        return $this->belongsTo(\App\Models\Play\Orders\Province::class);
    }
}
