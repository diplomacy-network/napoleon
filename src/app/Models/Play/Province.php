<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'variant_id',
        'short_name',
        'is_supply_center',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'variant_id' => 'integer',
        'is_supply_center' => 'boolean',
    ];


    public function variant()
    {
        return $this->belongsTo(\App\Models\Play\Variant::class);
    }
}
