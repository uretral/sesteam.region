<?php

namespace App\Models\Resources;

use App\Models\HasMany\BrunchPrice;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resources\Client;

class Branch extends Model
{
    protected $table = 'resource_branches';

    public function client()
    {
        return $this->hasMany(Client::class,'parent');
    }

    public function getPartnersAttribute($value)
    {
        return explode(',', $value);
    }

    public function setPartnersAttribute($value)
    {
        $this->attributes['partners'] = implode(',', $value);
    }

    public function getArticlesAttribute($value)
    {
        return explode(',', $value);
    }

    public function setArticlesAttribute($value)
    {
        $this->attributes['articles'] = implode(',', $value);
    }

    public function getClientsAttribute()
    {
        return Client::find($this->getAttribute('partners'));
    }

    public function getArtAttribute()
    {
        return Client::find($this->getAttribute('articles'));
    }


    Public function getStickerAttribute($sticker)
    {
        Return array_values(json_decode($sticker, true) ?: []);
    }

    Public function setStickerAttribute($sticker)
    {
        $this->attributes['sticker'] = json_encode(array_values($sticker),JSON_UNESCAPED_UNICODE);
    }
    public function getStickerDataAttribute()
    {
        $stickerData = [];
        foreach ($this->getAttribute('sticker') as $k => $sticker){
            $res = BusinessService::find($sticker['services'])->sortBy('sort');
            if($res) {
                $sticker['services'] = $res;
                $stickerData[] = $sticker;
            }
        }
        return $stickerData;
    }
    public function prices(){
        return $this->hasMany(BrunchPrice::class,'parent');
    }

    /*    public static function block($data,$b){
            return view('test.index',[
                'data' => $data->helpers,
                'backend' => $b
            ]);
        }*/


}
