<?php

namespace App\Models\HasMany;
use App\Models\Helper;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'hasmany_phones';
    protected $guarded = [];

        public function helpers()
        {
            return $this->hasMany(Helper::class,'parent');
        }

            public static function block($data,$b){
                return view('test.index',[
                    'data' => $data->helpers,
                    'backend' => $b
                ]);
            }
}
