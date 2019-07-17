<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'resource_prices';

    protected $fillable = ['id','name','heading','price'];

    public function homeServices(){
        return $this->belongsTo(HomeService::class,'parent');
    }


}
