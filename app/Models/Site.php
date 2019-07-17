<?php

namespace App\Models;

use App\Models\HasMany\Phone;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $connection = 'mysql_msk';
    public function phones(){
        return $this->hasMany(Phone::class,'parent');
    }

    public static function block($data = '',$b = ''){
        $t = Site::where('url',request()->getHost())->first();
        if($t) {
            $data = $t;
        } else {
            $data = Site::where('id',1)->first();
        }
        return view('blocks.contacts',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
