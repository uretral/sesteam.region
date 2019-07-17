<?php

namespace App\Models\Blocks;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'block_articles';



    public static function block($data,$b){
        $parent = Resource::findOrFail($data->parent_resource);
        $res = [];

//        $res = Resource::findOrFail($data->resource);

        foreach ($parent->model::all() as $p) {
            $res[] = $p;
        }

//
//        $data->link = Category::searchRootLink($data->resource);
//        $data->resourceData = $res->model::all();
        return view('blocks.article_listing',[
            'data' => $data,
            'res' => $res,
            'link' => MENU[$data->parent]['link'],
            'backend' => $b
        ]);
    }
}
