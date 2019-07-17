<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\Branch;
use App\Http\Controllers\Controller;
use App\Models\Resources\BusinessService;
use App\Models\Resources\Client;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BranchController extends Controller
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
        $grid = new Grid(new Branch);

        $grid->id('ID');
        $grid->name('Название');
        $grid->sort('Сортировка');

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
        $show = new Show(Branch::findOrFail($id));

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
        $form = new Form(new Branch);

        $form->tab('Настройки', function(Form $form){
            $form->display('id');
            $form->number('sort', 'Сортировка')->default(10);
            $form->alias('alias');
            $form->text('name','Название')->attribute('rel','alias');
            $form->textarea('intro', 'Интротекст')->default('');
            $form->textarea('longtitle', 'Длинный заголовок')->default('');
            $form->ckeditor('desc', 'Текст основной')->default('');
            $form->image('img', 'Иконка');

        });
        $form->tab('УТП', function(Form $form){
            $form->text('utp_heading', 'Заголовок');
            $form->image('utp_img', 'Изображение')->uniqueName();
            $form->text('utp_text_heading', 'Заголовок-текста');
            $form->textarea('utp_text', 'Текст');
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
        $form->tab('Цены', function(Form $form){
            $form->hasMany('prices','Цены', function ($form){
                $form->text('name','Прайс - заголовок');
                $form->ckeditorMany('text','Прайс');
            });
        });

        $form->tab('Дополнительно', function(Form $form){
            $form->multipleSelect('partners','Клиенты')->options(Client::all()->pluck('name','id'));
            $form->multipleSelect('articles','Статьи')->options(\App\Models\Resources\Article::all()->pluck('name','id'));
            $form->ckeditor('price','Цены');

            $form->ckeditor('warranty','Гарантия');
        });

        $form->tab('AIM',function (Form $form){
            $form->text('aim_heading','A.I.M. - Заголовок');
            $form->image('aim_img','A.I.M. - картинка');
            $form->ckeditor('aim_text','A.I.M. - текст');
        });

        $form->tab('Стикер', function($form){
            $form->text('sticker_heading','Оглавление раздела (Опционально)');
            $form->tableSortable('sticker',function ( $table){
                $table->textarea('name','Название раздела');
                $table->textarea('text','Краткое описание (Опционально - замещает краткое описание услуги)');
                $table->multipleSelect('services','Услуги')->options(BusinessService::all()->pluck('name','id'));
            });

        });
        $form->tab('SEO', function(Form $form){
            $form->textarea('seo_title','seo title');
            $form->textarea('seo_desc','seo description');
            $form->textarea('seo_key','seo keywords');

        });



        return $form;
    }

    public function content($alias){
        $data = Branch::where('alias',$alias)->firstOrFail();
        return view('resources.branch',[
            'data' => $data,
            'backend' => ''
        ]);
    }
}
