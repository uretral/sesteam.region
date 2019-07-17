<?php

namespace App\Models\Statics;

use Illuminate\Database\Eloquent\Model;


class RegionSearchWithPhone extends Model
{
//    protected $table = 'block_region_with_cite';

    public static function block($data,$b){
        return view('blocks.region_search_with_phone',[ // region_with_cite
            'data' => $data,
            'backend' => $b
        ]);
    }
}
