<?php
namespace App\Models\Forms;

use App\Models\Resources\Branch;
use Illuminate\Database\Eloquent\Model;

class FormBranches extends Model
{
    public static function block($data = '', $b = '') {
        return view('blocks.form_branches',[
            'data' => Branch::all(),
            'backend' => $b
        ]);
    }

}
