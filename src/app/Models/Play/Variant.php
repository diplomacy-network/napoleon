<?php

namespace App\Models\Play;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'adjudication_name',
        'scs_to_win',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    // Relations
    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }

    public function basePowers(): HasMany
    {
        return $this->hasMany(BasePower::class);
    }
}
