<?php

namespace App\Admin\Controllers;

use App\Models\Site;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SiteController extends Controller
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
        $grid = new Grid(new Site);

        $grid->id('id');
        $grid->region('Регион');
        $grid->url('Сайт');
        $grid->phone('Телефон');
        $grid->email('email');

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
        $show = new Show(Site::findOrFail($id));

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
        $form = new Form(new Site);

        $form->display('id');
        $form->text('region');
        $form->text('url');
        $form->mobile('phone')->options(['mask' => '+7 (999) 999 99 99']);
        $form->mobile('phone_href')->options(['mask' => '+79999999999']);
        $form->email('email');
        $form->text('name','Название');
        $form->textarea('text','Описание');
        $form->textarea('address','Адрес');
        $form->textarea('map','Карта');
        $form->hasMany('phones','Телефоны',function (Form\NestedForm $form) {
            $form->text('name','Название отдела');
            $form->mobile('phone','Название отдела')->options(['mask' => '+7 (999) 999 99 99']);
//            $form->mobile('phone_href','Москва');

        });
        return $form;
    }

    public static function regions(){
        return Site::orderBy('region')->get();
    }
    public static function currentRegionByUrl(){
        $t = Site::where('url',request()->getHost())->first();
        if($t) {
            return $t->toArray();
        } else {
            return Site::where('id',1)->first()->toArray();
        }

    }
}
