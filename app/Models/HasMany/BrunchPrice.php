<?php

namespace App\Models\HasMany;
use App\Models\Helper;
use App\Models\Resources\Branch;
use Illuminate\Database\Eloquent\Model;

class BrunchPrice extends Model
{
    protected $table = 'hasmany_brunches_prices';

    protected $guarded = [];

        public function price()
        {
            return $this->belongsTo(Branch::class,'parent');
        }

            public static function block($data,$b){
                return view('test.index',[
                    'data' => $data->helpers,
                    'backend' => $b
                ]);
            }
}
