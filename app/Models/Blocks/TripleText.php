<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

class TripleText extends Model
{
    protected $table = 'block_triple_text';

    public static function block($data,$b){
        return view('blocks.triple_text',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
