<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function login(){

        return view('mobile.user.user-login');

    }

    public function register(){

        return view('mobile.user.user-register');

    }

    public function registerSubmit(Request $request){

        parse_str($request->get('string'),$arr);

        if (empty($arr['user_name'])){
            return ['error'=>'用户名不能为空'];
        }elseif(empty($arr['user_email'])){
            return ['error'=>'邮箱不能为空'];
        }elseif(empty($arr['user_phone'])){
            return ['error'=>'手机号不能为空'];
        }elseif(empty($arr['password'])){
            return ['error'=>'密码不能为空'];
        }elseif(empty($arr['fixed_password'])){
            return ['error'=>'确认密码不能为空'];
        }elseif($arr['password'] != $arr['fixed_password']){
            return ['error'=>'密码与确认密码不一致'];
        }

        return ['success'=>'成功'];

    }

}
