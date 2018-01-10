<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        return view('admin.article-list',['data'=>Article::all()]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleInsert() {

        return view('admin.article-insert');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function articleInsertStore(Request $request) {


        if (is_file($file = $request->file('article_picture'))) {

            $filename = md5(time()).'.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads'),$filename);

           if (Article::create(array_merge($request->except(['article_picture']),['article_picture'=>$filename]))){

               goto succeed;

           }

           goto failed;

        }else{

            if (Article::create(array_merge($request->except(['article_picture']),['article_picture'=>'gst_logo.png']))){

                succeed:

                return redirect('/admin/article-list')->with('message','1');

            }else{

                failed:

                return back()->with('message','0');
            }

        }

    }

    /**
     * @param $article_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleUpdate($article_id) {

        return view('admin.article-update',['data'=>Article::find($article_id)]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ArticleUpdateStore(Request $request) {


        if (is_file($file = $request->file('article_picture'))) {

            $filename = md5(time()).'.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads'),$filename);

            if (Article::where('article_id',$request->get('article_id'))->update(array_merge($request->except(['article_picture','_token']),['article_picture'=>$filename]))){

                goto succeed;

            }

            goto failed;

        }else{

            $data = Article::find($request->get('article_id'));

            if (Article::where('article_id',$request->get('article_id'))->update(array_merge($request->except(['article_picture','_token']),['article_picture'=>$data['article_picture']]))){

                succeed:

                return redirect('/admin/article-list')->with('message','1');

            }else{

                failed:

                return back()->with('message','0');
            }

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
