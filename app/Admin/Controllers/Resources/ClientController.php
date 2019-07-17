<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\Branch;
use App\Models\Resources\Client;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ClientController extends Controller
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
        $grid = new Grid(new Client);

        $grid->id('ID');
        $grid->name('Название');
        $grid->sort('Сортировка');
        $grid->parent('родитель')->editable();

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
        $show = new Show(Client::findOrFail($id));

        $show->id('ID');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Client);

        $form->tab('Настройки', function(Form $form){
            $form->display('id');
            $form->number('sort', 'Сортировка')->default(10);
            $form->switch('main');
            $form->alias('alias');
            $form->text('name','Название')->attribute('rel','alias');
        });
        $form->tab('Контент', function(Form $form){
            $form->select('parent')->options(Branch::all()->pluck('name','id'));
            $form->textarea('intro', 'Интротекст');
            $form->ckeditor('desc', 'Текст основной');
            $form->image('img', 'Иконка');
        });
        return $form;
    }

    public function content($alias){
        $data = Client::where('alias',$alias)->firstOrFail();
        return view('resources.client',[
            'data' => $data,
            'backend' => ''
        ]);
    }
}
