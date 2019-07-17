<?php

namespace App\Models\Blocks;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'block_listing';

    public static function block($data,$b){
        $res = Resource::findOrFail($data->resource);
        $data->resourceData = $res->model::all();
        return view('blocks.listing',[
            'data' => $data,
            'backend' => $b
        ]);
    }
}
