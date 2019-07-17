<?php


namespace Encore\Admin\Form\Field;

use Encore\Admin\Form\Field;

class CKEditorMany extends Field
{

    public static $js = [
        '/vendor/laravel-admin/ckeditor/ckeditor.js',
        '/vendor/laravel-admin/ckeditor/adapters/jquery.js',
    ];

//    protected $view = 'admin.ckeditor';

    public function render()
    {
        $classes = str_replace(' ','.',$this->getElementClassString());
        $this->script = "$( 'textarea.{$classes}' ).ckeditor();";

        return parent::render();
    }
}
