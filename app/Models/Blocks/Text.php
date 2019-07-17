<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $table = 'block_texts';

    public static function block($data,$b){
        return view('blocks.text',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
