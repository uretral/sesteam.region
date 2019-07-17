<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('categories', CategoryController::class)->name('any','category');





    $router->resource('test', TestController::class);
    $router->resource('tim', TimController::class);

    $router->resource('blocks', 'BlockController');
    $router->resource('resources', 'ResourceController');
    $router->resource('region', SiteController::class);

    if(strpos(Request::instance()->path(),'admin/static/') !== false){
        $block = \App\Models\Block::where('url',request()->segment(3))->first();
        $router->resource('static/'.$block->url, StaticBlockController::class);
//        $router->resource('static/'.$block->url.'/{parent}', StaticBlockController::class);
    }

    if(strpos(Request::instance()->path(),'admin/block/') !== false){
        $block = \App\Models\Block::where('url',request()->segment(3))->first();
        $router->resource('block/'.$block->url, $block->controller);
        $router->resource('block/'.$block->url.'/{parent}', $block->controller);
    }

    if(strpos(Request::instance()->path(),'admin/resource/') !== false){
        $resource = \App\Models\Resource::where('alias',request()->segment(3))->first();
        $router->resource('resource/'.$resource->alias, $resource->controller);
        $router->resource('resource/'.$resource->alias.'/{parent}', $resource->controller);
    }
});
