<?php

namespace Encore\Admin\Form\Field;

use Encore\Admin\Form\NestedForm;

class TableSortable extends HasMany
{
    /**
     * @var string
     */
    protected $viewMode = 'tablesortable';

    /**
     * @var array
     */
    protected static $js = [
        '/vendor/laravel-admin/nestable/jquery.nestable.table.js',
    ];



    /**
     * Table constructor.
     *
     * @param string $column
     * @param array  $arguments
     */
    public function __construct($column, $arguments = [])
    {
        $this->column = $column;

        if (count($arguments) == 1) {
            $this->label = $this->formatLabel();
            $this->builder = $arguments[0];
        }

        if (count($arguments) == 2) {
            list($this->label, $this->builder) = $arguments;
        }

//        dump($this->buildNestedForm($this->column, $this->builder)->fields());
    }



    public function searchImages(){
        $imagesColumn = [];
        foreach ($this->buildNestedForm($this->column, $this->builder)->fields() as $field) if($field->rules == 'image'){
            $imagesColumn[] = $field->column;
        }
        return $imagesColumn;
    }

    /**
     * @return array
     */
    protected function buildRelatedForms()
    {
        if (is_null($this->form)) {
            return [];
        }

        $forms = [];
        $imagesColumn = $this->searchImages();

        if ($values = old($this->column)) {
            foreach ($values as $key => $data) {
                if ($data[NestedForm::REMOVE_FLAG_NAME] == 1) {
                    continue;
                }

                $forms[$key] = $this->buildNestedForm($this->column, $this->builder, $key)->fill($data);
            }
        } else {
            foreach ($this->value as $key => $data) {


//                dump($data);

                $hid = [];


                if (!empty($imagesColumn) ) {
                    foreach ($data as $d){
                        foreach ($imagesColumn as  $imgKey) {

                            if (key_exists($imgKey,$data)) {
                                $hid[$imgKey] = $data[$imgKey];
                            }
                        }
                    }


                }

                if (isset($data['pivot'])) {
                    $data = array_merge($data, $data['pivot']);
                }
                $forms[$key] = $this->buildNestedForm($this->column, $this->builder, $key, $hid)->fill($data);
            }

        }


        return $forms;
    }

    public function prepare($input)
    {
        $form = $this->buildNestedForm($this->column, $this->builder);

        $prepare = $form->prepare($input);

        return collect($prepare)->reject(function ($item) {
            return $item[NestedForm::REMOVE_FLAG_NAME] == 1;
        })->map(function ($item) {
            unset($item[NestedForm::REMOVE_FLAG_NAME]);

            return $item;
        })->toArray();
    }

    protected function getKeyName()
    {
        if (is_null($this->form)) {
            return;
        }

        return 'id';
    }

    protected function buildNestedForm($column, \Closure $builder, $key = null, $hid = null)
    {
        $form = new NestedForm($column);

        $form->setForm($this->form)
            ->setKey($key);

        call_user_func($builder, $form);


        if($hid) {
            foreach ($hid as $hKey => $h){
                $form->hidden($hKey)->default($h);
            }
        }






        $form->hidden(NestedForm::REMOVE_FLAG_NAME)->default(0)->attribute('class',NestedForm::REMOVE_FLAG_CLASS);//addElementClass(NestedForm::REMOVE_FLAG_CLASS);




        return $form;
    }

    public function render()
    {
        return $this->renderTable();
    }
}
