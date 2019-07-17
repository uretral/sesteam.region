<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\Branch;
use App\Models\Resources\BusinessService;
use App\Http\Controllers\Controller;
use App\Models\Resources\BusinessServiceCategory;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BusinessServiceController extends Controller
{
    use HasResourceActions;

    public $header = 'Услуги для бизнеса';

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->header)
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
            ->header($this->header)
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
            ->header($this->header)
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
        $grid = new Grid(new BusinessService);
        $grid->id('ID')->sortable();
        $grid->alias('alias')->sortable();
        $grid->name('Название')->sortable();
        $grid->name_short('Название')->sortable()->editable();
        $grid->sort('Сортировка')->sortable();
        $grid->enabled('Активность в меню')->switch()->sortable();
        $grid->parent()->select(BusinessServiceCategory::all()->pluck('name','id'))->sortable();

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->expand();

            // Add a column filter
            $filter->like('parent', 'Родитель')->select(BusinessServiceCategory::all()->pluck('name','id'));

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
        $show = new Show(BusinessService::findOrFail($id));

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
        $form = new Form(new BusinessService);

        $form->tab('Настройки', function(Form $form){
            $states = [
                'on'  => ['value' => 1, 'text' => 'on', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'off', 'color' => 'danger'],
            ];
            $form->display('id');
            $form->select('parent', 'Родитель')->options(BusinessServiceCategory::all()->pluck('name','id'));
            $form->alias('alias');
            $form->text('name','УТП');
            $form->text('name_short','Название для меню')->attribute('rel','alias');
            $form->number('sort', 'Сортировка')->default(10);
            $form->switch('enabled','Активность в меню')->options($states);
        });
        $form->tab('Контент', function(Form $form){
            $form->switch('popular', 'Добавить в популяные в меню');
            $form->switch('left_col', 'Слева');
            $form->switch('right_col', 'Справа');
            $form->textarea('intro');
            $form->ckeditor('desc');
            $form->image('img');
        });
        $form->tab('AIM',function (Form $form){
            $form->text('aim_heading','A.I.M. - Заголовок');
            $form->image('aim_img','A.I.M. - картинка');
            $form->ckeditor('aim_text','A.I.M. - текст');
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
        $form->tab('Прайс(ы)',function (Form $form){
            $form->hasMany('prices','прайс', function (Form\NestedForm $form){
                $form->text('name','заголовок');
//                $form->textarea('heading','заголовок');
                $form->ckeditorMany('price','Прайс');
            });

        });
        $form->tab('Стикер',function (Form $form){
            $form->switch('show_sticker', 'Показывать форму заявки на стикер');
        });
        $form->tab('Боковая панель', function(Form $form){
            $form->html('<h4>Сноска (А вы знаете что?..). У поля текст предпочтение</h4>');

            $form->switch('aside_cite_switcher', 'Включить');
            $form->image('aside_cite_img', 'картинка')->uniqueName();
            $form->textarea('aside_cite_text', 'Текст');
            $form->text('aside_cite_link', 'Ссылка');
            $form->text('aside_thing', 'насекомые?');

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

    public function content($alias){
        $data = BusinessService::where('alias',$alias)->firstOrFail();
        return view('resources.business_service',[
            'data' => $data,
            'backend' => ''
        ]);
    }
}
