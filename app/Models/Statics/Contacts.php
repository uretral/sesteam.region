<?php

namespace App\Models\Statics;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{


    public static function block($data = '',$b = ''){
        $data = Share::all();
        return view('blocks.share',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
