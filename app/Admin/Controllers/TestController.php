<?php


namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{

    public function test(){
        if(!Admin::user()){
            dump('555');
        }

//        dump(Session::get('login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d'));
        dump(Admin::user());

    }

}
