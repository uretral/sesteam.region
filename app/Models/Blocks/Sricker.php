<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

class Sricker extends Model
{
    protected $table = 'block_stickers';

    public static function block($data,$b){
        return view('blocks.sticker',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
