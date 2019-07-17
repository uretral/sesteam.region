<?php

namespace App\Models;

use App\Models\Blocks\IconedLink;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Helper
 *
 * @property int $id
 * @property string|null $parent
 * @property int|null $hook
 * @property string|null $name
 * @property string|null $img
 * @property string|null $link
 * @property string|null $h_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blocks\IconedLink|null $helpers
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereHText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereHook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Helper whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Helper extends Model
{
    protected $guarded = [];

    public function helpers()
    {
        return $this->belongsTo(IconedLink::class, 'parent');
    }
}
