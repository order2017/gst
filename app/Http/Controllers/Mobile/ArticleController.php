<?php

namespace App\Http\Controllers\Mobile;

use App\Article;
use App\Common\Common;
use Ixudra\Curl\Facades\Curl;
use App\User;
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

    // 地址用的
    public function view_add(Request $request,Common $common) {

        $data = $common->searchKey->SearchOne(Article::query()->where('article_type',$request->get('type_id','0'))->orderBy('updated_at','desc'),['article_add'],'100');

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

        // IP定位
        $response = Curl::to('http://apis.map.qq.com/ws/location/v1/ip')->withData( array( 'ip' => $request->getClientIp(),'key'=>'N2VBZ-7UO6F-EZTJT-JI6EG-RPYK7-55F6J' ) )->get();
        $arr = json_decode($response,true);

        $location =empty($arr['result']['location']['lat']) ?  '39.984154,116.307490' : $arr['result']['location']['lat'].','.$arr['result']['location']['lng'];

        // 逆地址解析(坐标位置描述)
        $respon = Curl::to('http://apis.map.qq.com/ws/geocoder/v1/')->withData( array( 'location' =>$location,'key'=>'N2VBZ-7UO6F-EZTJT-JI6EG-RPYK7-55F6J','get_poi'=>1 ) )->get();
        $addRes = json_decode($respon,true);

        $ipAdd = empty($addRes['result']['address']) ? '广东省东莞市':$addRes['result']['address'];


        if (!empty(session('mobile_user')['user_id'])){
            $res = User::where('user_id',session('mobile_user')['user_id'])->first();
            User::where('user_id',session('mobile_user')['user_id'])->update(['user_number'=>($res['user_number']+1)]);
        }

        $data = Article::find($request->get('article_id'));

        if (empty($data)){

            return back();

        }

        return view('mobile.article-details',['data'=>$data,'add'=>$ipAdd]);

    }
}
