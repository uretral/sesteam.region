<?php

namespace App\Models\Resources;

use App\Models\HasMany\Table;
use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    protected $table = 'resource_tables';

    Public function getContentAttribute($content)
    {
        Return array_values(json_decode($content, true) ?: []);
    }

    Public function setContentAttribute($content)
    {
        dump($content);
        $this->attributes['content'] = json_encode(array_values($content));
    }

    public function tables()
    {
        return $this->hasMany(Table::class,'parent');
    }

        public static function block($data,$b){
        return view('test.index',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
