<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'resource_libraries';

    public static function block($data,$b){
        return view('test.index',[
            'data' => $data->helpers,
            'backend' => $b
        ]);
    }


}
