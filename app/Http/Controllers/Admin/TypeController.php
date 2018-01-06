<?php

namespace App\Http\Controllers\Admin;

use App\ArticleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $type = ArticleType::paginate(15);

        $arr=$this->data($type,$pid=0);

        return view('admin.type-list',['type'=>$arr]);

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

    public function articleTypeInsertUpdate(Request $request) {

        dd($request->all());

    }

    public function articleTypeInsertUpdateStore(Request $request) {

        dd($request->all());

    }
}
