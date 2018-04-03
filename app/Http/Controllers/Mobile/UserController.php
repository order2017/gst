<?php

namespace App\Http\Controllers\Mobile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * 用户登录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){

        if (session('mobile_user')){

            return redirect('/user-index');

        }

        //app('common')->smsFunction->Send_sms('13480731740');

        return view('mobile.user.user-login');

    }

    /**
     * 用户登录
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function loginStore(Request $request) {

        parse_str($request->get('string'),$arr);

        if (empty($arr['user_name'])){
            return ['error'=>'用户名不能为空'];
        }elseif(empty($arr['password'])){
            return ['error'=>'密码不能为空'];
        }

        $user = User::where('user_name',$arr['user_name'])->first();

        if (empty($user['password'])){
            return ['error'=>'用户名不存在'];
        }

        if (!empty($user['user_type'])==30){
            return ['error'=>'无法访问!'];
        }

        if (!Hash::check($arr['password'],$user['password'])){

            return ['error'=>'用户名或密码错误!'];

        }

        session(['mobile_user' => $user]);

        return ['success'=>'登录成功'];

    }

    /**
     * 用户注册
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(){

        return view('mobile.user.user-register');

    }

    /**
     * 用户注册
     * @param Request $request
     * @return array
     */
    public function registerSubmit(Request $request){

        parse_str($request->get('string'),$arr);

        if (empty($arr['user_name'])){
            return ['error'=>'用户名不能为空'];
        }elseif(empty($arr['wechat_number'])){
            return ['error'=>'微信号不能为空'];
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

        $result = empty($query[0]['user_phone']) ? '':$query[0]['user_phone'];

        if ($result==$arr['user_phone']){
            return ['error'=>'手机号已经存在'];
        }

        if (User::create(array_merge(array_except($arr,['password']),['password'=>bcrypt($arr['password'])]))){
            return ['success'=>'注册成功'];
        }else{
            return ['success'=>'注册失败'];
        }

    }

    /**
     * 用户退出
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {

        session()->forget('mobile_user');
        return redirect('/user-login')->with('message','3');

    }

    /**
     * 用户中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userIndex() {

        $user = User::find(session('mobile_user')['user_id']);

        return view('mobile.user.user-index',['data'=>$user]);

    }

}
