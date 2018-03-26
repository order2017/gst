<?php

namespace App\Http\Controllers\Mobile;

use App\User;
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

        $query = User::where('user_phone',$arr['user_phone'])->get();

        if ($query[0]['user_phone']==$arr['user_phone']){
            return ['error'=>'手机号已经存在'];
        }

        if (User::create(array_merge(array_except($arr,['password']),['password'=>bcrypt($arr['password'])]))){
            return ['success'=>'注册成功'];
        }else{
            return ['success'=>'注册失败'];
        }

    }

}
