<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\HumidityData
 *
 * @property int $id
 * @property string $city
 * @property float $humidity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|HumidityData newModelQuery()
 * @method static Builder|HumidityData newQuery()
 * @method static Builder|HumidityData query()
 * @method static Builder|HumidityData whereCity($value)
 * @method static Builder|HumidityData whereCreatedAt($value)
 * @method static Builder|HumidityData whereHumidity($value)
 * @method static Builder|HumidityData whereId($value)
 * @method static Builder|HumidityData whereUpdatedAt($value)
 * @method static Builder|HumidityData onlyTrashed()
 * @method static Builder|HumidityData whereDeletedAt($value)
 * @method static Builder|HumidityData withTrashed()
 * @method static Builder|HumidityData withoutTrashed()
 * @mixin Eloquent
 */
class HumidityData extends Model
{
    use SoftDeletes;
}
