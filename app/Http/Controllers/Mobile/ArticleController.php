<?php

namespace App\Http\Controllers\Mobile;

use App\Article;
use App\Common\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        return view('mobile.article-list');

    }

    /**
     * @param Request $request
     * @param Common $common
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function view(Request $request,Common $common) {

        $data = $common->searchKey->Search(Article::query()->where('article_type',$request->get('type_id','0'))->orderBy('updated_at','desc'),['article_name'],'100');

        if (count($data)){

            return view('mobile.article-view',['data'=>$data,'type'=>$this->TypeList()]);

        }else{

            return back()->with('message',0);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function details(Request $request) {

        $data = Article::find($request->get('article_id'));

        if (empty($data)){

            return back();

        }

        return view('mobile.article-details',['data'=>$data]);

    }
}
