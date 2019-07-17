<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resources\BusinessServicesMethod
 *
 * @property int $id
 * @property int|null $parent
 * @property string|null $name
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\BusinessServicesMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BusinessServicesMethod extends Model
{
    protected $table = 'hasmany_business_service_methods';
    protected $guarded = [];

    public function methods(){
        return $this->belongsTo(BusinessService::class,'parent');
    }

/*    public static function block($data,$b){
        return view('test.index',[
            'data' => $data->helpers,
            'backend' => $b
        ]);
    }*/


}
