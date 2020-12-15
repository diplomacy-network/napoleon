<?php

namespace App\Models\Play\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hold extends Model
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

    public function location()
    {
        return $this->belongsTo(\App\Models\Play\Province::class);
    }
}
