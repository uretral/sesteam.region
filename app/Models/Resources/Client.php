<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    protected $table = 'resource_clients';

    public function branches()
    {
        return $this->belongsTo(Branch::class,'parent');
    }

/*    public static function block($data,$b){
        return view('test.index',[
            'data' => $data->helpers,
            'backend' => $b
        ]);
    }*/


}
