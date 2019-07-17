<?php

namespace App\Admin\Controllers\Blocks;

use App\Models\Blocks\TripleText;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use PhpParser\Node\Expr\PostDec;

class TripleTextController extends Controller
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
        $grid = new Grid(new TripleText);

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
        $show = new Show(TripleText::findOrFail($id));

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
        $form = new Form(new TripleText);

        $form->tab('Настройки', function(Form $form){
            $form->display('id','ID');
            $form->text('nr')->default(Request::get('nr'));
            $form->text('parent')->default(Request::get('parent'));
            $form->text('name','Название')->attribute('rel','alias')->rules('required');
        });
        $form->tab('Контент', function(Form $form){
            $form->textarea('title','Заголовок');
            $form->text('sign','Декоративная часть');

            $form->html('БЛОК 1');

            $form->text('col_1_name','Заголовок');
            $form->textarea('col_1_text','Текст');
            $form->text('col_1_link','Ссылка');

            $form->html('БЛОК 2');

            $form->text('col_2_name','Заголовок');
            $form->textarea('col_2_text','Текст');
            $form->text('col_2_link','Ссылка');

            $form->html('БЛОК 3');

            $form->text('col_3_name','Заголовок');
            $form->textarea('col_3_text','Текст');
            $form->text('col_2_link','Ссылка');
        });

        $form->saved(function (Form $form) {
            return Category::updateSource($form->model(), \request()->segment(3), get_class($this));
        });

        return $form;
    }
}
