<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticBlockController extends Controller
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
            ->body($this->remove());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->remove());
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->remove());
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
            ->body($this->add());
    }


    public function remove()
    {
        $source = Category::where('id',\request()->get('parent'))->first()->toArray();
        $arJson = [];
        foreach (json_decode($source['source']) as $s) if(\request()->get('nr') != $s->nr){
            $arJson[] =  $s;
        }
        Category::where('id',\request()->get('parent'))->update(['source' => json_encode($arJson,JSON_UNESCAPED_UNICODE)]);
//        dump($arJson);

        return 'dd';
    }
    public function add(){

        $this->id = \request()->get('parent');
        $this->name = 'static';
        $this->static = 1;
        $this->nr = \request()->get('nr');
        $this->parent = \request()->get('parent');

//        dump(get_class($this));
//        dump(\request()->segment(3));
//        dump(\request()->get('parent'));
//        dump(\request()->get('nr'));
//        dump($this);

        return Category::updateSource($this, \request()->segment(3), get_class($this));

    }

}
