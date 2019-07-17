<?php

namespace App\Models\Statics;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Statics\Breadcrumbs
 *
 * @property int $id
 * @property int|null $parent
 * @property string|null $name
 * @property int|null $nr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs whereNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Statics\Breadcrumbs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Breadcrumbs extends Model
{
    public static function block($data,$b = ''){


        $root = explode('/',Category::root($data));
        $arLink = [];
        foreach ($root as $key => $items){

            $res = Category::where('alias',$items)->first();
            if($res) {
                if($key == count($root) - 1) {
                    $arLink['last'] = $res['name'];
                } else {
                    $arLink[$res['link']] = $res['name'];
                }
            }
        }
        return view('blocks.breadcrumbs',[
            'data' => $arLink,
            'backend' => $b
        ]);
    }

    public static function resource($name){
        $root = explode('/',request()->getPathInfo());
        $arLink = [];
        array_shift($root);
        array_pop($root);
        foreach ($root as $key => $items){
            $res = Category::where('alias',$items)->first();
            $arLink[$res['link']] = $res['name'];
        }
        $arLink['last'] = $name;
        return view('blocks.breadcrumbs',[
            'data' => $arLink,
            'backend' => ''
        ]);
    }
}
