<?php

namespace App\Admin\Controllers\Resources;

use App\Models\Resources\Article;
use App\Http\Controllers\Controller;
use App\Models\Resources\HomeService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ArticleController extends Controller
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
        $grid = new Grid(new Article);

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
        $show = new Show(Article::findOrFail($id));

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
        $form = new Form(new Article);

        $form->tab('Настройки', function(Form $form){

            $form->display('ID');
            $form->select('parent', 'Родитель')->options(HomeService::all()->pluck('name','id'));
            $form->text('alias', 'alias');
            $form->text('name','Название')->attribute('rel','alias');
            $form->image('intro_img', 'Картинка для слайдера');
            $form->textarea('utp', 'УТП');
            $form->number('sort', 'Сортировка')->default(10);
            $form->textarea('intro', 'Интротекст')->default('');
            $form->ckeditor('desc', 'Текст основной')->default('');

        });
        $form->tab('Боковая панель', function($form){
            $form->html('<h4>Сноска (А вы знаете что?..). У поля текст предпочтение</h4>');
            $states = [
                'on' => ['value' => 1, 'text' => 'Вкл.', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'Выкл.', 'color' => 'danger'],
            ];
            $form->switch('aside_cite_switcher', 'Включить')->states($states);
            $form->image('aside_cite_img', 'картинка')->uniqueName();
            $form->textarea('aside_cite_text', 'Текст');
            $form->text('aside_cite_link', 'Ссылка');
            $form->html('<h4>Сноска (Реклама). У поля текст предпочтение</h4>');
            $form->switch('aside_advert_switcher', 'Включить')->states($states);
            $form->image('aside_advert_img', 'картинка')->uniqueName();
            $form->textarea('aside_advert_text', 'Текст');
            $form->text('aside_advert_link', 'Ссылка');
            $form->text('aside_thing', 'насекомые?');
        });
        $form->tab('SEO', function($form){
            $form->textarea('seo_title','seo title');
            $form->textarea('seo_desc','seo description');
            $form->textarea('seo_key','seo keywords');

        });


        return $form;
    }

    public function content($alias){
        $data = Article::where('alias',$alias)->firstOrFail();
        return view('resources.article',[
            'data' => $data,
            'backend' => ''
        ]);
    }
}
