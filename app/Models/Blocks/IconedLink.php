<?php

namespace App\Models\Blocks;

use App\Models\Helper;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\IconedLink
 *
 * @property int $id
 * @property int|null $parent
 * @property int|null $hook
 * @property string|null $name
 * @property int|null $nr
 * @property string|null $rr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Helper[] $helpers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereHook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereRr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blocks\IconedLink whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IconedLink extends Model
{
    protected $table = 'block_iconed_links';

    public function helpers()
    {
        return $this->hasMany(Helper::class,'parent');
    }

    public static function block($data,$b){
        return view('blocks.iconed_link',[
            'data' => $data->helpers,
            'backend' => $b
        ]);
    }
}
