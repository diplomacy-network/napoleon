<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'base_power_id',
        'user_id',
        'adjudication_instance_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'base_power_id' => 'integer',
        'user_id' => 'integer',
        'adjudication_instance_id' => 'integer',
    ];


    public function basePower()
    {
        return $this->belongsTo(\App\Models\Play\BasePower::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function adjudicationInstance()
    {
        return $this->belongsTo(\App\Models\Play\AdjudicationInstance::class);
    }
}
