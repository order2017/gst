<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'article_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_name',
        'article_contact',
        'article_picture',
        'article_tel',
        'article_qq',
        'article_type',
        'article_content',
        'article_add',
        'article_street',
        'article_sq',
        'article_mj',
        'article_pmt',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * 文件上传
     * @param $field
     * @return string
     */
    public static function uploadImg($field)
    {

        if (request()->hasFile($field)) {

            $pic = request()->file($field);

            if ($pic->isValid()) {

                $filename = md5(time().str_random(10)).'.'.$pic->getClientOriginalExtension();

                $pic->move(public_path('uploads'),$filename);

                return $filename;
            }

        }

        return "";
    }

    /**
     * 删除图片
     * @param $path
     * @return bool
     */
    public static function delPicture($path){

        if (file_exists(public_path('uploads').'/'.$path)) {

           return unlink(public_path('uploads').'/'.$path);

        }

        return false;
    }

    /**
     * 显示图片
     * @param $data
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function TitlePic($data){

        if (!empty($data)){
            if (file_exists(public_path('/uploads/'.$data))){
                $res = url('/uploads/'.$data);
            }else{
                goto end;
            }
        }else{
            end:
            $res = asset('/uploads/gst_logo.png');
        }

        return $res;
    }

}
