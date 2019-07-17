<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\Library;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LibraryController extends Controller
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
        $grid = new Grid(new Library);

        $grid->id('ID')->sortable();
        $grid->name('Название')->sortable()->editable();
        $grid->sort('Сортировка')->sortable()->editable();

        $states = [
            'on'  => ['value' => 1, 'text' => 'лево', 'color' => 'success'],
            'off' => ['value' => 2, 'text' => 'право', 'color' => 'danger'],
        ];
        $grid->menu_position('Положение')->switch($states);

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
        $show = new Show(Library::findOrFail($id));

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
        $form = new Form(new Library);

        $form->display('id');
        $form->alias('alias');
        $form->number('sort')->default(10);
        $form->text('link','Ссылка на ресурс');
        $states = [
            'on'  => ['value' => 1, 'text' => 'лево', 'color' => 'success'],
            'off' => ['value' => 2, 'text' => 'право', 'color' => 'danger'],
        ];
        $form->switch('menu_position','Положение ')->states($states);
        $form->text('name', 'Название')->attribute('rel', 'alias');


        return $form;
    }

    public function content($alias)
    {
        $data = Library::where('alias', $alias)->firstOrFail();
        return view('test.index', [
            'data' => $data,
            'backend' => ''
        ]);
    }
}
