<?php

namespace App\Models\HasMany;

use App\Models\Resources\BusinessService;
use Illuminate\Database\Eloquent\Model;

class BusinessPrices extends Model
{
    protected $table = 'hasmany_business_prices';

    protected $fillable = ['id','parent','name','heading','price'];

    public function prices()
    {
        return $this->belongsTo(BusinessService::class, 'parent');
    }

    public static function block($data, $b)
    {
        return view('test.index', [
            'data' => $data->helpers,
            'backend' => $b
        ]);
    }
}

