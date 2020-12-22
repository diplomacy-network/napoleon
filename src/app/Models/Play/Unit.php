<?php

namespace App\Models\Play;

use App\Enums\Play\UnitTypeEnum;
use App\Models\Play\Orders\Build;
use App\Models\Play\Orders\Convoy;
use App\Models\Play\Orders\Disband;
use App\Models\Play\Orders\Move;
use App\Models\Play\Orders\SupportHold;
use App\Models\Play\Orders\SupportMove;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phase_id',
        'power_id',
        'province_id',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phase_id' => 'integer',
        'power_id' => 'integer',
        'province_id' => 'integer',
        'type' => UnitTypeEnum::class,
    ];


    // Relations
    public function phase()
    {
        return $this->belongsTo(\App\Models\Play\Phase::class);
    }

    public function power()
    {
        return $this->belongsTo(\App\Models\Play\Power::class);
    }

    public function province()
    {
        return $this->belongsTo(\App\Models\Play\Province::class);
    }

    public function unitOrder(): HasOne
    {
        return $this->hasOne(UnitOrder::class);
    }

    public function builds(): HasMany
    {
        return $this->hasMany(Build::class);
    }

    public function convoys(): HasMany
    {
        return $this->hasMany(Convoy::class);
    }

    public function disband(): HasMany
    {
        return $this->hasMany(Disband::class);
    }

    public function moves(): HasMany
    {
        return $this->hasMany(Move::class);
    }

    public function supportHolds(): HasMany
    {
        return $this->hasMany(SupportHold::class);
    }

    public function supportMoves(): HasMany
    {
        return $this->hasMany(SupportMove::class);
    }


    // Queries
    public function aggregateAllPossibleOrders()
    {
        // TODO: Make a test for this
        if($this->type == UnitTypeEnum::BUILDER()){
            return $this->builds()->get();
        } else {
            return $this->convoys()->get()
                ->push($this->disband()->get()->all())
                ->push($this->moves()->get()->all())
                ->push($this->supportHolds()->get()->all())
                ->push($this->supportMoves()->get()->all())
                ->flatten();

        }
    }
}
