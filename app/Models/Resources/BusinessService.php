<?php

namespace App\Models\Resources;

use App\Models\HasMany\BusinessPrices;
use Illuminate\Database\Eloquent\Model;


class BusinessService extends Model
{
    protected $table = 'resource_business_services';

    public function methods()
    {
        return $this->hasMany(BusinessServicesMethod::class, 'parent');
    }

    public function getBranchesAttribute($value)
    {
        return explode(',', $value);
    }

    public function setBranchesAttribute($value)
    {
        $this->attributes['branches'] = implode(',', $value);
    }
    public function getBranchesArrayAttribute()
    {
        return Branch::find($this->getAttribute('branches'));
    }

    public function prices(){
        return $this->hasMany(BusinessPrices::class,'parent');
    }

    /*    public static function block($data,$b){
            return view('test.index',[
                'data' => $data->helpers,
                'backend' => $b
            ]);
        }*/


}
