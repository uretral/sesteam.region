<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resources\PestType
 *
 * @property int $id
 * @property string|null $alias
 * @property int|null $parent
 * @property int|null $sort
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\PestType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PestType extends Model
{
    protected $table = 'resource_pest_types';
}
