<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\BusinessService;
use App\Models\Resources\Tables;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TablesController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tables);

        $grid->id('ID')->sortable();
        $grid->name('Название')->sortable();
        $grid->sort('Сортировка')->sortable()->editable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Tables::findOrFail($id));

        $show->id('ID');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tables);

        $form->tab('Настройки', function(Form $form){
            $form->display('ID');
            $form->alias('alias');
            $form->number('sort')->default(10);
            $form->switch('enabled');
            $form->switch('disabled');
//          $form->select('parent');
            $form->text('name','Название')->attribute('rel','alias');
            $form->ckeditor('introtext','Интро текст');
        });
        $form->tab('Таблица', function(Form $form){
           $form->hasMany('tables', function (Form\NestedForm $form){
               $sample = '<h3>Заголовок</h3>
<ul>
	<li>Пункт</li>
	<li>Пункт</li>
</ul>';
               $form->text('name','Название');
               $form->text('link','Ссылка');
               $form->image('img','Изображение');
               $form->textarea('col_1','Текст')->default($sample);
               $form->textarea('col_2','Текст')->default($sample);
               $form->textarea('col_3','Текст')->default($sample);
           });
        });
        $form->tab('SEO', function($form){
            $form->textarea('seo_title','seo title');
            $form->textarea('seo_desc','seo description');
            $form->textarea('seo_key','seo keywords');

        });




        //$form->display('Created at');
        //$form->display('Updated at');

        return $form;
    }


    public function test($form) {
        dump($_POST);

//        @dump(Tables::find($form->model()->id));
//        @dump($form->model()->content);

//        foreach ($form->model()->content as $f){
//
//
//        }


//        @dump($form->builder()->fields());
        exit();
    }


    protected function formForSortableTable()
    {
        $form = new Form(new Tables);

        $form->tab('Настройки', function($form){
            $form->display('ID');
            $form->alias('alias');
            $form->number('sort')->default(10);

//          $form->select('parent');
            $form->text('name','Название')->attribute('rel','alias');
            $form->ckeditor('introtext','Интро текст');
        });
        $form->tab('Таблица', function($form){
            $form->tableSortable('content',function ($table){

                $sample = '<h3>Заголовок</h3>
<ul>
	<li>Пункт</li>
	<li>Пункт</li>
</ul>';


                $table->text('link','ссылка');
                $table->text('heading','Заголовок');
                $table->image('img','Изображение');
                $table->textarea('col_1','ячейка')->default($sample);
                $table->textarea('col_2','ячейка')->default($sample);
                $table->textarea('col_3','ячейка')->default($sample);
            });
        });
        $form->tab('SEO', function($form){
            $form->textarea('seo_title','seo title');
            $form->textarea('seo_desc','seo description');
            $form->textarea('seo_key','seo keywords');

        });


        $form->saving(function ($form){
            return $this->test($form);
        });


        //$form->display('Created at');
        //$form->display('Updated at');

        return $form;
    }


    public function content($alias){
        $data = Tables::where('alias',$alias)->firstOrFail();
        return view('resources.table_content',[
            'data' => $data,
            'backend' => ''
        ]);
    }



}
