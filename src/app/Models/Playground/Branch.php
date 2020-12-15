<?php

namespace App\Models\Playground;

use App\Models\Play\Phase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'created_from',
        'public',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'created_from' => 'integer',
        'public' => 'boolean',
    ];


    public function createdFrom()
    {
        return $this->belongsTo(Phase::class);
    }

    
}
