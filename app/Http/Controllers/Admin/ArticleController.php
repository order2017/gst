<?php

namespace App\Http\Controllers\Admin;

use App\Article;
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

        return view('admin.article-list',['data'=>Article::all(),'type'=>$this->TypeList()]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleInsert() {

        return view('admin.article-insert',['data'=>$this->TypeList()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function articleInsertStore(Request $request) {

        try {

            Article::create(array_merge($request->except(['article_picture']),['article_picture'=>Article::uploadImg('article_picture')]));

            return redirect('/admin/article-list')->with('message','1');

        } catch (\Exception $e) {

            return back()->with('message','0');

        }

    }

    /**
     * @param $article_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleUpdate($article_id) {

        return view('admin.article-update',['data'=>Article::find($article_id),'type'=>$this->TypeList()]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ArticleUpdateStore(Request $request) {

        try {

            $data = $request->except(['_token']);

            if ($request->hasFile('article_picture')) {

                $data['article_picture'] = Article::uploadImg('article_picture');

                if ($res = Article::find($data['article_id'])['article_picture']) {

                    Article::delPicture($res);

                }

            }

            if (Article::where('article_id',$data['article_id'])->update($data)){

                return redirect('/admin/article-list')->with('message','1');

            }

        } catch (\Exception $e) {

            return back()->with('message','0');

        }

    }

    public function ArticleDelete($article_id) {

        $result = Article::where('article_id', $article_id)->delete();

        if ($result) {

            return "1";

        } else {

            return "0";

        }

    }

}
