<?php

namespace App\Models\Statics;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = 'block_share';

    public static function block($data = '',$b = ''){
        $data = Share::all();
        return view('blocks.share',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
