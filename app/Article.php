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

                $filename = md5(time()).'.'.$pic->getClientOriginalExtension();

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

}
