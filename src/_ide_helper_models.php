<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\LocationOrders
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LocationOrders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationOrders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationOrders query()
 */
	class LocationOrders extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\AdjudicationInstance
 *
 * @property int $id
 * @property int $adjudicatable_id
 * @property string $adjudicatable_type
 * @property int|null $winning_power_id
 * @property int $variant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $adjudicatable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Play\Phase[] $phases
 * @property-read int|null $phases_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Play\Power[] $powers
 * @property-read int|null $powers_count
 * @property-read \App\Models\Play\Variant $variant
 * @property-read \App\Models\Play\Power|null $winningPower
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance whereAdjudicatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance whereAdjudicatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance whereVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdjudicationInstance whereWinningPowerId($value)
 */
	class AdjudicationInstance extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\BasePower
 *
 * @property int $id
 * @property int $variant_id
 * @property string $name
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Variant $variant
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower query()
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BasePower whereVariantId($value)
 */
	class BasePower extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\Influence
 *
 * @property int $id
 * @property int $phase_id
 * @property int $power_id
 * @property int $is_supply_center
 * @property int $province_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Phase $phase
 * @property-read \App\Models\Play\Power $power
 * @property-read \App\Models\Play\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|Influence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Influence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Influence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Influence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Influence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Influence whereIsSupplyCenter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Influence wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Influence wherePowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Influence whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Influence whereUpdatedAt($value)
 */
	class Influence extends \Eloquent {}
}

namespace App\Models\Play\Orders{
/**
 * App\Models\Play\Orders\Build
 *
 * @property int $id
 * @property string $type
 * @property int $location_id
 * @property int $phase_id
 * @property int $power_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $location
 * @method static \Illuminate\Database\Eloquent\Builder|Build newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Build newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Build query()
 * @method static \Illuminate\Database\Eloquent\Builder|Build whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Build whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Build whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Build wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Build wherePowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Build whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Build whereUpdatedAt($value)
 */
	class Build extends \Eloquent {}
}

namespace App\Models\Play\Orders{
/**
 * App\Models\Play\Orders\Convoy
 *
 * @property int $id
 * @property int $unit_id
 * @property int $location_id
 * @property int $from_id
 * @property int $to_id
 * @property bool $selected_for_resultion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $from
 * @property-read \App\Models\Play\Province $location
 * @property-read \App\Models\Play\Province $to
 * @property-read \App\Models\Play\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereSelectedForResultion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convoy whereUpdatedAt($value)
 */
	class Convoy extends \Eloquent {}
}

namespace App\Models\Play\Orders{
/**
 * App\Models\Play\Orders\Disband
 *
 * @property int $id
 * @property int $unit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $location
 * @property-read \App\Models\Play\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Disband newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disband newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disband query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disband whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disband whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disband whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disband whereUpdatedAt($value)
 */
	class Disband extends \Eloquent {}
}

namespace App\Models\Play\Orders{
/**
 * App\Models\Play\Orders\Hold
 *
 * @property int $id
 * @property int $unit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $location
 * @property-read \App\Models\Play\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Hold newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hold newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hold query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hold whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hold whereUpdatedAt($value)
 */
	class Hold extends \Eloquent {}
}

namespace App\Models\Play\Orders{
/**
 * App\Models\Play\Orders\Move
 *
 * @property int $id
 * @property int $unit_id
 * @property int $to_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $location
 * @property-read \App\Models\Play\Province $to
 * @property-read \App\Models\Play\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Move newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Move newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Move query()
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Move whereUpdatedAt($value)
 */
	class Move extends \Eloquent {}
}

namespace App\Models\Play\Orders{
/**
 * App\Models\Play\Orders\SupportHold
 *
 * @property int $id
 * @property int $unit_id
 * @property int $to_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $location
 * @property-read \App\Models\Play\Province $to
 * @property-read \App\Models\Play\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportHold whereUpdatedAt($value)
 */
	class SupportHold extends \Eloquent {}
}

namespace App\Models\Play\Orders{
/**
 * App\Models\Play\Orders\SupportMove
 *
 * @property int $id
 * @property int $unit_id
 * @property int $from_id
 * @property int $to_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $from
 * @property-read \App\Models\Play\Province $location
 * @property-read \App\Models\Play\Province $to
 * @property-read \App\Models\Play\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportMove whereUpdatedAt($value)
 */
	class SupportMove extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\Phase
 *
 * @property int $id
 * @property int $adjudication_instance_id
 * @property string $season
 * @property string $year
 * @property \App\Enums\Play\PhaseTypeEnum $type
 * @property \Illuminate\Support\Carbon $started_at
 * @property int|null $length
 * @property bool $adjudicated
 * @property int|null $previous_phase_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\AdjudicationInstance $adjudicationInstance
 * @property-read Phase|null $previousPhase
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Play\Unit[] $units
 * @property-read int|null $units_count
 * @method static \Illuminate\Database\Eloquent\Builder|Phase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereAdjudicated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereAdjudicationInstanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase wherePreviousPhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereYear($value)
 */
	class Phase extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\Power
 *
 * @property int $id
 * @property int $base_power_id
 * @property int|null $user_id
 * @property int $adjudication_instance_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\AdjudicationInstance $adjudicationInstance
 * @property-read \App\Models\Play\BasePower $basePower
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Power newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Power newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Power query()
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereAdjudicationInstanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereBasePowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Power whereUserId($value)
 */
	class Power extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\Province
 *
 * @property int $id
 * @property int $variant_id
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Unit|null $unit
 * @property-read \App\Models\Play\Variant $variant
 * @method static \Illuminate\Database\Eloquent\Builder|Province name(string $name)
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereVariantId($value)
 */
	class Province extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\ProvinceName
 *
 * @property int $id
 * @property int $province_id
 * @property string $long_name
 * @property string $language
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName whereLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProvinceName whereUpdatedAt($value)
 */
	class ProvinceName extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\TextInstruction
 *
 * @property int $id
 * @property string $payload
 * @property int $phase_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Phase $phase
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction query()
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextInstruction whereUpdatedAt($value)
 */
	class TextInstruction extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\Unit
 *
 * @property int $id
 * @property int $phase_id
 * @property int $power_id
 * @property int $province_id
 * @property \App\Enums\Play\UnitTypeEnum $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\Phase $phase
 * @property-read \App\Models\Play\Power $power
 * @property-read \App\Models\Play\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 */
	class Unit extends \Eloquent {}
}

namespace App\Models\Play{
/**
 * App\Models\Play\Variant
 *
 * @property int $id
 * @property string $name
 * @property string $adjudication_name
 * @property int $scs_to_win
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Play\BasePower[] $basePowers
 * @property-read int|null $base_powers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Play\Province[] $provinces
 * @property-read int|null $provinces_count
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereAdjudicationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereScsToWin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereUpdatedAt($value)
 */
	class Variant extends \Eloquent {}
}

namespace App\Models\Playground{
/**
 * App\Models\Playground\Branch
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $created_from_phase_id
 * @property int|null $playground_id
 * @property bool $public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Play\AdjudicationInstance|null $adjudicationInstance
 * @property-read \App\Models\Play\Phase $createdFrom
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedFromPhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePlaygroundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 */
	class Branch extends \Eloquent implements \App\Models\Contracts\AdjudicatableInterface {}
}

namespace App\Models\Playground{
/**
 * App\Models\Playground\Playground
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Playground\Branch[] $branches
 * @property-read int|null $branches_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Playground newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playground newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playground query()
 * @method static \Illuminate\Database\Eloquent\Builder|Playground whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playground whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playground whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playground whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playground whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playground whereUserId($value)
 */
	class Playground extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Playground\Playground[] $playgrounds
 * @property-read int|null $playgrounds_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

