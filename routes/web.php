<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('MENU',\App\Models\Category::list());
define('REGION',\App\Admin\Controllers\SiteController::currentRegionByUrl());

//dump(MENU);
//Route::post('/gratitude','');

Route::get('/tim/{alias?}','\App\Models\Tim@index');


Route::get('/tratra', '\App\Admin\Controllers\TestController@test');
Route::any('/attach', 'ImageController@attach');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', 'TestController@index');
Route::get('/category','\App\Admin\Controllers\CategoryController@page');
Route::get('/blocks/{alias}/{id}/{static}/{backend?}', '\App\Admin\Controllers\CategoryController@block');

Route::post('/sendmail', 'Ajax\ContactController@send');

/*Route::get('/rendermail', function(){
    return Mail::render('email.callback', [
        'sender' => (object)['name' => 'testt', 'email' => 'test@gmail.com', 'message' => 'Test message', 'subject' => 'Test subject']
    ]);
});*/


$categories = \App\Models\Category::all();
//static pages
foreach ($categories as $category){
    if(request()->getPathInfo() == $category->link){
        Route::get(request()->path().'' ,'\App\Admin\Controllers\CategoryController@content');
    }
}
// dynamic pages
foreach ($categories as $category){

    $path = pathinfo(request()->getPathInfo(),PATHINFO_DIRNAME).'/{alias}';
    $arPath = explode('/',request()->getPathInfo());
    $alias = array_pop($arPath);
    $path = str_replace('//', '/', $path);

    if(strpos($category->link,'{alias}') && $category->link == $path && $category->hook ){

        $resource = \App\Models\Resource::find($category->hook);
        if($resource->model::where('alias',$alias)->first()){

            Route::get($category->link ,$resource->controller."@content");
        } else {

            continue;
        }
    }
}

