<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginSigninRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login() {

        if (session('admin_user')){

            return redirect('/admin/index');

        }
        return view('admin.login');

    }

    /**
     * @param LoginSigninRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginStore(LoginSigninRequest $request) {

        $user = User::where('user_name',$request->get('user_name'))->first();

        if (!Hash::check($request->get('password'),$user['password'])){

            return redirect('/admin/login')->with('message','0');

        }

        if ($user['user_type'] == User::IS_USER){

            session(['admin_user' => $user]);

            return redirect('/admin/index')->with('message','1');

        }else{

            return redirect('/admin/login')->with('message','2');

        }

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {

        session()->forget('admin_user');
        return redirect('admin/login')->with('message','3');

    }
}
