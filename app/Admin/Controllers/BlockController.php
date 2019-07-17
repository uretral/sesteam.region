<?php

namespace App\Admin\Controllers;

use App\Models\Block;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BlockController extends Controller
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
        $grid = new Grid(new Block);

        $grid->id('ID');
        $grid->name('Название');
        $grid->actions(function ($actions) {
            $g = $actions->row->toArray();
            if(!$g['no_table']) {
                $actions->prepend('<a href="/admin/block/'.$g['url'].'"><i class="fa fa-arrow-right"></i></a>&nbsp;&nbsp;&nbsp;');
            }
            $actions->disableDelete();
        });
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
        $show = new Show(Block::findOrFail($id));

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



        $form = new Form(new Block);

        $form->display('ID');
        $form->text('name','Название блока');
        $form->text('controller');
        $form->text('model');
        $form->text('url');
        $form->radio('no_table','Без таблицы')->options([0 => 'Нет', 1 => 'Да'])->default(0);
        $form->radio('static','Статический')->options([0 => 'Нет', 1 => 'Да'])->default(0);






        $form->display('Created at');
        $form->display('Updated at');

        return $form;
    }
}
