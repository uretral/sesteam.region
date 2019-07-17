<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;


class BusinessServiceCategory extends Model
{
    protected $table = 'resources_business_service_categories';

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

    public function children(){
        return $this->hasMany(BusinessService::class,'parent');
    }

/*    public static function block($data,$b){
        return view('test.index',[
            'data' => $data->helpers,
            'backend' => $b
        ]); 8 926 834 76 02
    }*/


}
