<?php

namespace App\Http\Controllers\Mobile;

use App\Contract;
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
}
