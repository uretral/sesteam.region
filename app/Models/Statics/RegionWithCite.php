<?php

namespace App\Models\Statics;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Statics\RegionWithCite
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\RegionWithCite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\RegionWithCite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\RegionWithCite query()
 * @mixin \Eloquent
 */
class RegionWithCite extends Model
{
//    protected $table = 'block_region_with_cite';

    public static function block($data,$b){
        return view('blocks.region_with_cite',[ // region_with_cite
            'data' => $data,
            'backend' => $b
        ]);
    }
}
