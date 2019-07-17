<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\HalfWithText
 *
 * @property int $id
 * @property int|null $parent
 * @property string|null $name
 * @property int|null $nr
 * @property string|null $img
 * @property string|null $left_heading
 * @property string|null $left_text
 * @property string|null $right_heading
 * @property string|null $right_text
 * @property int $to_right
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereLeftHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereLeftText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereRightHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereRightText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereToRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\HalfWithText whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HalfWithText extends Model
{
    protected $table = 'block_half_with_texts';

    public static function block($data,$b){
        return view('blocks.half_with_text',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
