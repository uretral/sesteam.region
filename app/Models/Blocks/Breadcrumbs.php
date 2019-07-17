<?php

namespace App\Models\Blocks;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Breadcrumbs
 *
 * @property int $id
 * @property int|null $parent
 * @property string|null $name
 * @property int|null $nr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs whereNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\Breadcrumbs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Breadcrumbs extends Model
{
    public static function block($data,$b){

        $root = explode('/',Category::root($data->parent));
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
}
