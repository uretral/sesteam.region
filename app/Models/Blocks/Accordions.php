<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

class Accordions extends Model
{

    public function getAccordionAttribute($accordion)
    {

        return array_values(json_decode($accordion, true) ?: []);
    }

    public function setAccordionAttribute($accordion)
    {
        $this->attributes['accordion'] = json_encode(array_values($accordion),JSON_UNESCAPED_UNICODE);
    }




    protected $table = 'block_accordions';

    public static function block($data,$b=''){
        return view('blocks.accordions',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
