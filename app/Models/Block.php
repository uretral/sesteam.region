<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Block
 *
 * @property int $id
 * @property string|null $controller
 * @property string|null $model
 * @property string|null $name
 * @property string|null $url
 * @property int $no_table
 * @property int|null $static
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereNoTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereStatic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereUrl($value)
 * @mixin \Eloquent
 */
class Block extends Model
{}
