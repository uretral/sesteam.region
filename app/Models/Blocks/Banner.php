<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Banner
 *
 * @property int $id
 * @property int|null $parent
 * @property string|null $name
 * @property int|null $nr
 * @property string|null $img
 * @property string|null $cite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereCite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Banner whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Banner extends Model
{
    public static function block($data,$b){
        return view('blocks.banner',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
