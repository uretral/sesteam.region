<?php

namespace App\Models\Blocks;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;

class ResourceMenuIcons extends Model
{
    protected $table = 'block_resource_menu_icons';



    public static function block($data,$b){
        $res = Resource::findOrFail($data->resource);
        $data->link = Category::searchRootLink($data->resource);
        $data->resourceData = $res->model::all();
        return view('blocks.resource_menu_icons',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}

// Blocks\BannerController
//App\Models\Blocks\Banner
