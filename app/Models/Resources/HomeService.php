<?php

namespace App\Models\Resources;

use App\Models\HasMany\HomeServicesAcc;
use App\Models\HasMany\HomeServicesGallery;
use App\Models\Resources\Article;
use Illuminate\Database\Eloquent\Model;

class HomeService extends Model
{
    protected $table = 'resource_home_services';



    public function gallery()
    {
        return $this->hasMany(HomeServicesGallery::class, 'parent');
    }

    public function steps()
    {
        return $this->hasMany(HomeServicesAcc::class, 'parent');
    }

    public function getLibrariesAttribute($value)
    {
            return explode(',', $value);
    }

    public function setLibrariesAttribute($value)
    {
        $this->attributes['libraries'] = implode(',', $value);
    }

    public function getLibAttribute($value)
    {
        return explode(',', $value);
    }

    public function setLibAttribute($value)
    {
        $this->attributes['lib'] = implode(',', $value);
    }

    public function getAskAttribute($value)
    {
        return explode(',', $value);
    }

    public function setAskAttribute($value)
    {
        $this->attributes['ask'] = implode(',', $value);
    }
    public function getFourAttribute()
    {
        return Article::find($this->getAttribute('libraries'));
    }
    public function getCommonAttribute()
    {
        return Article::find($this->getAttribute('lib'));
    }

    public function getFaqAttribute()
    {
        return Article::find($this->getAttribute('ask'));
    }

    public function prices(){
        return $this->hasMany(Price::class,'parent');
    }
}
