<?php

namespace App\Http\Controllers\Admin;

use App\Common\Common;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @param Common $common
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Common $common) {

        $data = $common->searchKey->Search(User::query()->where('user_type','<',30)->orderBy('updated_at','desc'),['user_phone'],'15');

        return view('admin.user-list',['data'=>$data]);

    }

    /**
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userEdit($user_id) {

        $data = User::find($user_id);

        return view('admin.user-edit',['data'=>$data]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userEditStore(Request $request) {

        $data = User::where('user_id',$request->get('user_id'))->update($request->except(['_token','user_id']));

        if ($data) {
            return redirect('/admin/user-list')->with('message','1');
        }else{
            return back()->with('message','0');
        }

    }

    /**
     * @param $user_id
     * @return string
     */
    public function userEditDel($user_id) {

        $res = User::find($user_id);

        if ($res->delete()) {

            return "1";

        } else {

            return "0";

        }

    }
}
