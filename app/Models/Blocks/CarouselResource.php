<?php

namespace App\Models\Blocks;

use App\Models\Resource;
use App\Models\Resources\Branch;
use Illuminate\Database\Eloquent\Model;

class CarouselResource extends Model
{

    protected $table = 'block_carousel_resource';

    public static function block($data,$b){

        $parents = Resource::find($data->resource_parent);
        $children = Resource::find($data->resource);

        $arData = [];

        foreach ($parents->model::orderBy('sort')->get() as $parent){
            $parent->children = $children->model::where('parent',$parent->id)->get();
            $arData[] = $parent;
        }

        $data->resource = $arData;

        return view('blocks.carousel_resource',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
