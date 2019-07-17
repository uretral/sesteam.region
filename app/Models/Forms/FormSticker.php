<?php
namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;

class FormSticker extends Model
{
    public static function block($data = '', $b = '') {
        return view('forms.form_siticker',[
            'data' => '',
            'backend' => $b
        ]);
    }

}
