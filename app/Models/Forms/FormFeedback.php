<?php
namespace App\Models\Forms;
use Illuminate\Database\Eloquent\Model;

class FormFeedback extends Model
{
    public static function block($data = '', $b = '') {
        return view('forms.feedback',[
            'data' => '',
            'backend' => $b
        ]);
    }

}
