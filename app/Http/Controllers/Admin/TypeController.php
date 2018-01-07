<?php

namespace App\Http\Controllers\Admin;

use App\ArticleType;
use App\Common\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * @param $data
     * @param int $pid
     * @return array
     */
    protected function data($data,$pid=0){
        $newArr=array();
        foreach ($data as $key => $value) {
            if ($value->type_pid==$pid) {
                $newArr[$value->type_id]=$value;
                $newArr[$value->type_id]->parent=$this->data($data,$value->type_id);
            }
        }
        return $newArr;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleTypeList() {

        $type = ArticleType::all();

        $arr=$this->data($type,$pid=0);

        $newArr = Common::arrayPage($arr);

        return view('admin.type-list',['type'=>$newArr]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleTypeInsert() {

        return view('admin.type-insert');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function articleTypeInsertStore(Request $request) {

        ArticleType::create($request->all());

        return redirect('/admin/type-list');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function articleTypeInsertUpdate(Request $request) {

        if (empty($request->get('type_id')) && empty($request->get('type_name'))){

            return redirect('/admin/type-list');

        }else{

            return view('admin.type-update');

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function articleTypeInsertUpdateStore(Request $request) {

       $res =  ArticleType::where('type_id',$request->get('type_id'))->update(['type_name'=>$request->get('type_name')]);

       if ($res){

           return redirect('/admin/type-list')->with('message',1);

       }else{

           return back();

       }

    }

    /**
     * @param $id
     * @return string
     */
    public function articleTypeDelete($id)
    {
        $result = DB::delete("delete from article_types where type_id=$id or type_path like '%,$id,%'");

        if ($result) {

            return "1";

        } else {

            return "0";

        }

    }

}
