<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\BusinessService;
use App\Models\Resources\Client;
use App\Models\Resources\Tim;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TimController extends Controller
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
        $grid = new Grid(new Tim);

        $grid->id('ID');
        $grid->name('Название');
        //$grid->intro_img('Превью');

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
        $show = new Show(Tim::findOrFail($id));

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
        $form = new Form(new Tim);

//        $form->tab('Настройки', function( $form){
            $form->display('ID');
            $form->alias('alias');
//          $form->select('parent');
            $form->text('name','Название')->attribute('rel','alias');
            $form->number('sort')->default(10);
            $form->hasMany('helpers',function ($form){
                $form->text('name');
                $form->image('img');
//                $tableSortable->text('col_1');
//                $tableSortable->text('col_2');
//                $tableSortable->textarea('col_3');
//                $tableSortable->multipleSelect('col_4')->options(BusinessService::all()->pluck('name','id'));

            });
//        });
/*        $form->tab('Превью', function(Form $form){

            $form->image('intro_img','Иконка');
            $form->textarea('introtext','Интро текст');
        });
        $form->tab('Контент', function(Form $form){
            $form->image('detail_img','Картинка');
            $form->ckeditor('content','Текст');
        });
        $form->tab('SEO', function(Form $form){
            $form->textarea('seo_title','seo title');
            $form->textarea('seo_desc','seo description');
            $form->textarea('seo_key','seo keywords');

        });
        $form->tab('many', function(Form $form){
            $form->multipleSelect('many','мультиселект')->options(Client::all()->pluck('name','id'));
        });*/


        //$form->display('Created at');
        //$form->display('Updated at');

        return $form;
    }

    public function content($alias){
        $data = Tim::where('alias',$alias)->firstOrFail();
        return view('test.index',[
            'data' => $data,
            'backend' => ''
        ]);
    }
}
