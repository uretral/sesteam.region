<?php


namespace App\Models\Statics;


use App\Models\Category;
use App\Models\Resource;
use App\Models\Resources\BusinessService;
use Encore\Admin\Grid\Displayers\Modal;

class Search extends Modal
{

    public static function block($data,$b){
        $q = request()->get('q');
        $resources = Resource::where('searchable',1)->get();
        $searchArr = [];
        foreach ($resources as $res){
            $search =  $res->model::where('name', 'LIKE', "%$q%")
                ->where('intro', 'LIKE', "%$q%")
                ->where('desc', 'LIKE', "%$q%")
                ->get();
            if($search->count()){
                $menu = Category::where('hook',$res->id)->first();
                if($menu->parent) {
                    $searchArr[$res->id]['parent'] = Category::where('id',$menu->parent)->first();
                }
                $searchArr[$res->id]['menu'] = $menu;
                $searchArr[$res->id]['collection'] = $search;
            }
        }

        return view('blocks.search',[
            'data' => $searchArr,
            'backend' => $b,
        ]);
    }


}
