<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->increments('article_id')->comment('文章ID');
            $table->string('article_name')->nullable()->comment('文章标题');
            $table->string('article_picture')->nullable()->comment('文章图片');
            $table->string('article_contact')->nullable()->comment('文章联系人');
            $table->string('article_tel',15)->nullable()->comment('文章电话');
            $table->string('article_qq',15)->nullable()->comment('文章QQ');
            $table->tinyInteger('article_type')->default('0')->comment('文章类型');
            $table->longText('article_content')->nullable()->comment('文章内容');
            $table->string('article_add')->nullable()->comment('文章地址');
            $table->string('article_street')->nullable()->comment('文章街道');

            $table->string('article_sq')->nullable()->comment('商圈');
            $table->string('article_mj')->nullable()->comment('面积');
            $table->string('article_pmt')->nullable()->comment('平面图');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
