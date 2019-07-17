<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;


class HalfWithAccordion extends Model
{
    protected $table = 'block_half_with_accordion';

    public function helpers()
    {
        return $this->hasMany(Helper::class, 'parent');
    }

    public static function block($data, $b)
    {
        return view('blocks.half_with_accordion', [
            'data' => $data,
            'backend' => $b
        ]);
    }
}
