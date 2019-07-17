<?php

namespace App\Models\Resources;

use App\Models\Helper;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'resource_tims';

    public function getManyAttribute($value)
    {
        return explode(',', $value);
    }

    public function setManyAttribute($value)
    {
        $this->attributes['many'] = implode(',', $value);
    }

    public function getBlaAttribute()
    {
        return Client::find($this->getAttribute('many'));
    }


    Public function getTabledAttribute($tabled)
    {
        Return array_values(json_decode($tabled, true) ?: []);
    }

    Public function setTabledAttribute($tabled)
    {
        $this->attributes['tabled'] = json_encode(array_values($tabled));
    }

    public function helpers()
    {
        return $this->hasMany(Helper::class, 'parent');
    }



    public static function index()
    {
        return view('blocks.breadcrumbs');
    }
}
