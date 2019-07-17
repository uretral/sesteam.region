<?php

namespace App\Models\HasMany;
use App\Models\Helper;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'hasmany_table';
    protected $guarded = [];

        public function helpers()
        {
            return $this->belongsTo(Helper::class,'parent');
        }

            public static function block($data,$b){
                return view('test.index',[
                    'data' => $data->helpers,
                    'backend' => $b
                ]);
            }
}
