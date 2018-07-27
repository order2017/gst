<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    public function index(){

        return view('mobile.user.user-contract');

    }

    public function indexStore(Request $request){

        dd($request->all());

    }
}
