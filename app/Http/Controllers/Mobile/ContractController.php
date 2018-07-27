<?php

namespace App\Http\Controllers\Mobile;

use App\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    public function index(){

        return view('mobile.user.user-contract');

    }

    public function indexStore(Request $request){

        $data = $request->except(['_token','user_id']);

        Contract::create(array_merge($data,['user_id'=>session('mobile_user')->user_id]));

        return redirect('user-index');

    }
}
