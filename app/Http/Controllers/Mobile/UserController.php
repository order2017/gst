<?php

namespace App\Http\Controllers\Mobile;

use App\Article;
use App\Http\Requests\SeekPasswordRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Cache;

class UserController extends Controller
{
    /**
     * @return mixed
     */
    protected function TypeList(){

        $data = DB::select("select article_types.*,concat(type_path,type_id) p from article_types order by p");

        foreach ($data as $key => $value) {

            $arr=explode(',', $value->type_path);

            $size=count($arr);

            $value->size=$size-2;

            $value->html=str_repeat('|----', $size-2).$value->type_name;
        }

        return $data;

    }

    /**
     * 用户登录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){

        if (session('mobile_user')){

            return redirect('/user-index');

        }

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

        if ($user['user_id']==1){
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

        /*$cacheSms = Cache::get('sms');
        if ($arr['user_phone_yz'] != $cacheSms){
            return ['error'=>'输入的验证码错误'];
        }*/

        $query = User::where('user_phone',$arr['user_phone'])->first();

        $result = empty($query['user_phone']) ? '':$query['user_phone'];

        if ($result==$arr['user_phone']){
            return ['error'=>'手机号已经存在'];
        }

        if (User::create(array_merge(array_except($arr,['password']),['password'=>bcrypt($arr['password'])]))){
            Cache::forget('sms');
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

        $contract = User::find($user['user_id'])->contract()->first();

        return view('mobile.user.user-index',['data'=>$user,'contract'=>$contract]);

    }

    /**
     * 发送验证码
     * @param Request $request
     * @return string
     */
    public function Send(Request $request) {

        if (!empty($request->get('user_phone'))) {

            app('common')->smsFunction->Send_sms($request->get('user_phone'));

            return '1';

        }else{

            return '0';

        }

    }

    /**
     * 用户个人微信二维码
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userQrcode() {

        return view('mobile.user.user-qrcode');

    }

    /**
     * 用户修改密码
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userPassword() {

        return view('mobile.user.user-password',['data'=>session('mobile_user')]);

    }

    /**
     * 用户修改密码
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userPasswordStore(Request $request) {

        if (!empty($request->get('password')) && !empty($request->get('fixed_password'))) {

            if ($request->get('password') == $request->get('fixed_password')) {

                User::where('user_id',$request->get('user_id'))->update(['password'=>bcrypt($request->get('password'))]);

                return back()->with('mgs','2');

            }else{

                return back()->with('mgs','1');

            }

        }else{

            return back()->with('mgs','0');

        }

    }

    /**
     * 用户发布
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userPush() {

        $data = User::where('user_id',session('mobile_user')['user_id'])->first();

        /* if ($data['user_money']=="0"){
             return redirect('/user-qrcode')->with('message','4');
         }else{*/
        return view('mobile.user.user-push',['data'=>$this->TypeList()]);
        // }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userPushStore(Request $request) {

        try {

            $data = User::where('user_id',session('mobile_user')['user_id'])->first();

            // if ($data['user_money']=="0"){
            //   return redirect('/user-index')->with('message','4');
            // }else{
            if ($request->get('article_type')==3){ //发布商场招商信息奖励十元一条，
                User::where('user_id',$data['user_id'])->update(['user_money'=>($data['user_money']+10)]);
            }elseif($request->get('article_type')==4){ // 发布商业招商信息奖励十元一条，
                User::where('user_id',$data['user_id'])->update(['user_money'=>($data['user_money']+10)]);
            }elseif($request->get('article_type')==5){ // 发布商场买卖信息收费五十元一条
                User::where('user_id',$data['user_id'])->update(['user_money'=>($data['user_money']-50)]);
            }elseif($request->get('article_type')==6){ // 发布商业买卖信息收费五十元一条
                User::where('user_id',$data['user_id'])->update(['user_money'=>($data['user_money']-50)]);
            }elseif($request->get('article_type')==7){ // 发布设备买卖信息奖励十元一条，
                User::where('user_id',$data['user_id'])->update(['user_money'=>($data['user_money']+10)]);
            }elseif($request->get('article_type')==8){ // 发布品牌拓展信息奖励十元一条，
                User::where('user_id',$data['user_id'])->update(['user_money'=>($data['user_money']+10)]);
            }else{ // 不扣

            }

            // }

            Article::create(array_merge($request->except(['article_picture']),['article_picture'=>Article::uploadImg('article_picture')]));

            return back()->with('message','1');

        } catch (\Exception $e) {

            return back()->with('message','0');

        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SeekPassword() {

        return view('mobile.user.seek-password');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SeekPasswordStore(Request $request) {

        if (empty($request->get('user_phone'))){
            return back()->with('message','0');
        }elseif(empty($request->get('user_phone_yz'))){
            return back()->with('message','1');
        }

        $data = User::where('user_phone',$request->get('user_phone'))->first();

        if (empty($data['user_phone']) == $request->get('user_phone')){
            return back()->with('message','2');
        }

        $cacheSms = Cache::get('sms');

        if ($request->get('user_phone_yz') == $cacheSms){

            Cache::forget('sms');
            return redirect('/set-password?user_phone='.$data['user_phone']);

        }else{
            return back()->with('message','3');
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SetPassword(Request $request){
        if (empty($request->get('user_phone'))){
            return redirect('/seek-password')->with('message','4');
        }else{
            return view('mobile.user.set-password');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function SetPasswordStore(Request $request){

        if (!empty($request->get('password')) && !empty($request->get('fixed_password'))){

            if ($request->get('password') == $request->get('fixed_password')) {

                $data = User::where('user_phone',$request->get('user_phone'))->first();
                if ($data){

                    User::where('user_id',$data['user_id'])->update(['password'=>bcrypt($request->get('password'))]);

                    return redirect('/user-login')->with('message','6');

                }else{
                    return redirect('/seek-password')->with('message','4');
                }

            }else{

                return back()->with('message','1');

            }

        }else{
            return back()->with('message','0');
        }


    }

}
