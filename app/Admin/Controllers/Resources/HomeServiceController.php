<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\Article;
use App\Models\Resources\HomeService;
use App\Http\Controllers\Controller;
use App\Models\Resources\PestType;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class HomeServiceController extends Controller
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
        $grid = new Grid(new HomeService);

        $grid->id('Id');
        $grid->alias('Alias');
        $grid->name('Имя');
        $grid->sort('Сортировка')->editable()->sortable();
        $grid->menu('В меню')->switch()->sortable();
        $grid->banner('Баннер')->image();
        $grid->actions(function ($actions) {
            $actions->prepend('<a target="_blank" href="/'.$actions->row->alias.'"><i class="fa fa-arrow-right"></i></a>');
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
        $show = new Show(HomeService::findOrFail($id));

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
        $form = new Form(new HomeService);

        $form->tab('Настройки', function(Form $form){
            $states = [
                'on'  => ['value' => 1, 'text' => 'enable', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'disable', 'color' => 'danger'],
            ];
            $form->display('id');
            $form->alias('alias');
            $form->select('parent')->options(PestType::all()->pluck('name','id'));
            $form->text('name','Название')->attribute('rel','alias');
            $form->number('sort', 'Сортировка')->default(10);
            $form->switch('menu', 'В главном меню')->states($states);
        });
        $form->tab('Контент', function(Form $form){
            $form->image('banner', 'Баннер')->uniqueName();
            $form->image('intro_img', 'Картинка превью в списке')->uniqueName();
            $form->textarea('utp', 'УТП');
            $form->ckeditor('intro', 'Интротекст');
            $form->ckeditor('desc', 'Текст основной');
        });
        $form->tab('Прайс', function(Form $form){
            $form->ckeditor('price_head','Заголовок');
            $form->ckeditor('price_body','Текст прайса');
        });
        $form->tab('Галерея', function(Form $form){
            $form->hasMany('gallery', function (Form\NestedForm $form) {
                $form->image('img','Изображение')->uniqueName();
            });
        });
        $form->tab('Шаги', function(Form $form){
            $form->html('<h3>Блок Шаги с фото</h3>');
            $form->ckeditor('steps_text', 'Шаги текст');
            $form->image('steps_img', 'Фото')->uniqueName();
            $form->switch('mobile_img', 'Фото в мобильном');

            $form->hasMany('steps', function (Form\NestedForm $form) {
                $form->text('title','Заголовок');
                $form->textarea('text','Текст');
            });

        });
        $form->tab('Видео', function(Form $form){
            $form->html('<h3>Блок Видео или фото с текстом</h3>');
            $form->text('video_video', 'Видео');
            $form->image('video_img', 'Изображение')->uniqueName();
            $form->ckeditor('video_text', 'Текст');
        });
        $form->tab('Цитата', function(Form $form){
            $form->html('<h3>Блок с цитатой</h3>');
            $form->text('cite_heading', 'Заголовок');
            $form->textarea('cite_text', 'Текст');
        });

        $form->tab('Прайс(ы)',function (Form $form){
            $form->hasMany('prices','прайс', function (Form\NestedForm $form){
                $form->text('name','заголовок');
//                $form->textarea('heading','заголовок');
                $form->ckeditorMany('price','Прайс');
            });

        });

        $form->tab('F.A.Q.', function(Form $form){
            $form->text('lib_heading','Общий заголовок (внизу справа)');
            $form->multipleSelect('lib','Общие статьи')->options(Article::all()->pluck('name', 'id'));
            $form->divide();
            $form->text('libraries_h','Заголовок 4 статьи');
            $form->multipleSelect('libraries','4 статьи')->options(Article::all()->pluck('name', 'id'));
            $form->text('ask_h','Заголовок для FAQа');
            $form->multipleSelect('ask','Статьи для FAQа')->options(Article::all()->pluck('name', 'id'));
        });
        $form->tab('SEO', function(Form $form){
            $form->textarea('seo_title','seo title');
            $form->textarea('seo_desc','seo description');
            $form->textarea('seo_key','seo keywords');

        });


        return $form;
    }

    public function content($alias){
        $data = HomeService::where('alias',$alias)->firstOrFail();
        return view('resources.home_service',[
            'data' => $data,
            'backend' => '',
//            'seo' => [
//                'title' => $row->seo_title,
//                'description' => $row->seo_desc,
//                'keywords' => $row->seo_key,
//            ]

        ]);
    }
}
