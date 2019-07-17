<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\Branch;
use App\Models\Resources\BusinessService;
use App\Models\Resources\BusinessServiceCategory;
use App\Http\Controllers\Controller;
use App\Models\Resources\HomeService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BusinessServiceCategoryController extends Controller
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
        $grid = new Grid(new BusinessServiceCategory);

        $grid->id('ID')->sortable();
        $grid->name('Название')->sortable()->editable();
        $grid->sort('Сортировка')->editable()->sortable();
        $grid->menu_position()->select([
            1 => '<= Слева',
            2 => 'Справа =>'
        ]);

        $grid->enabled('Активность в меню')->switch();

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
        $show = new Show(BusinessServiceCategory::findOrFail($id));

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
        $form = new Form(new BusinessServiceCategory);

        $form->tab('Настройки', function(Form $form){
            $states = [
                'on'  => ['value' => 1, 'text' => 'on', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'off', 'color' => 'danger'],
            ];
            $form->display('id');
//            $form->select('parent', 'Родитель')->options(BusinessServiceCategory::all()->pluck('name','id'));
            $form->alias('alias');
            $form->select('menu_position')->options([
                1 => '<= Слева',
                2 => 'Справа =>'
            ]);
            $form->text('name','Название')->attribute('rel','alias');
            $form->number('sort', 'Сортировка')->default(10);
            $form->switch('enabled','Активность в меню')->options($states);
        });
        $form->tab('Контент', function(Form $form){
            $form->switch('popular', 'Добавить в популяные в меню');
            $form->textarea('intro');
            $form->ckeditor('detail');
            $form->image('img');
        });
        $form->tab('Дополнительно', function(Form $form){
            $form->multipleSelect('branches')->options(Branch::all()->pluck('name','id'));
            $form->ckeditor('price');
            $form->ckeditor('warranty');
        });
        $form->tab('Методы', function(Form $form){
            $form->hasMany('methods', function (Form\NestedForm $form){
                $form->text('name');
                $form->textarea('text');
            });
        });
        $form->tab('Боковая панель', function(Form $form){
            $form->html('<h4>Сноска (А вы знаете что?..). У поля текст предпочтение</h4>');

            $form->switch('aside_cite_switcher', 'Включить');
            $form->image('aside_cite_img', 'картинка')->uniqueName();
            $form->textarea('aside_cite_text', 'Текст');
            $form->text('aside_cite_link', 'Ссылка');

            $form->html('<h4>Сноска (Реклама). У поля текст предпочтение</h4>');
            $form->switch('aside_advert_switcher', 'Включить');
            $form->image('aside_advert_img', 'картинка')->uniqueName();
            $form->textarea('aside_advert_text', 'Текст');
            $form->text('aside_advert_link', 'Ссылка');
        });
        $form->tab('SEO', function(Form $form){
            $form->textarea('seo_title','seo title');
            $form->textarea('seo_desc','seo description');
            $form->textarea('seo_key','seo keywords');

        });


        return $form;
    }





//    protected function formFormer()
//    {
//        $form = new Form(new BusinessServiceCategory);
//
//        $form->display('id');
//        $form->number('sort');
//        $form->alias('alias');
//        $form->text('name','Название')->attribute('rel','alias');
//
//        return $form;
//    }

    public function content($alias){
        $data = BusinessServiceCategory::where('alias',$alias)->firstOrFail();
        return view('resources.business_service',[
            'data' => $data,
            'backend' => ''
        ]);
    }
}
