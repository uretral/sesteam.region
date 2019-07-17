<?php

namespace App\Models\HasMany;

use App\Models\Resources\HomeService;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HasMany\HomeServicesGallery
 *
 * @property int $id
 * @property int $parent
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resources\HomeService $gallery
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HasMany\HomeServicesGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HomeServicesGallery extends Model
{
    protected $table = 'hasmany_home_services_gallery';
    protected $fillable = ['id'];

    public function gallery()
    {
        return $this->belongsTo(HomeService::class, 'parent');
    }

/*    public static function block($data,$b){
        return view('test.index',[
            'data' => $data->helpers,
            'backend' => $b
        ]);
    }*/


}
