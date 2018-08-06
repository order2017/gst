<?php

namespace App\Http\Controllers\Mobile;

use App\Contract;
use App\OneContract;
use App\TwoContract;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    public function index(){

        return view('mobile.user.user-contract');

    }

    public function indexStore(Request $request){
        $request->flash();
        if ($request['sc_name']==""){
            return back()->with('mgs','0');
        }
        if ($request['sc_person']==""){
            return back()->with('mgs','1');
        }
        if ($request['sc_tel']==""){
            return back()->with('mgs','2');
        }

        $data = $request->except(['_token','user_id']);

        $res = Contract::create(array_merge($data,['user_id'=>session('mobile_user')->user_id]));

        if ($res){
            return back()->with('mgs','199');
        }else{
            return back()->with('mgs','188');
        }

    }

    public function indexShow(){

        $user = User::find(session('mobile_user')['user_id']);

        $contract = Contract::where('user_id',$user['user_id'])->first();

        return view('mobile.user.user-contract-show',['user'=>$user,'contract'=>$contract]);

    }

    // 商场招租
    public function shopContractOne(){

        return view('mobile.contract.shop-contract-one');

    }

    public function shopContractOneStore(Request $request){

        $request->flash();
        if ($request['qy_zj']==""){
            return back()->with('mgs','0');
        }

        $data = $request->except(['_token','user_id']);

        $res = OneContract::create(array_merge($data,['user_id'=>session('mobile_user')->user_id]));

        if ($res){
            return back()->with('mgs','199');
        }else{
            return back()->with('mgs','188');
        }

    }

    // 商场买卖
    public function shopContractTwo(){

        return view('mobile.contract.shop-contract-two');

    }

    public function shopContractTwoStore(Request $request){

        $request->flash();
        if ($request['qy_scmc']==""){
            return back()->with('mgs','0');
        }

        $data = $request->except(['_token','user_id']);

        $res = TwoContract::create(array_merge($data,['user_id'=>session('mobile_user')->user_id]));

        if ($res){
            return back()->with('mgs','199');
        }else{
            return back()->with('mgs','188');
        }

    }

    // 签约二维码
    public function shopQrcode() {

        return view('mobile.contract.shop-qrcode');
        
    }
}
