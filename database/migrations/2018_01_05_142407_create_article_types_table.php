<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_types', function (Blueprint $table) {

            $table->increments('type_id')->comment('分类ID');
            $table->string('type_name',45)->nullable()->comment('分类名称');
            $table->integer('type_pid')->default('0')->comment('分类父级ID');
            $table->string('type_path')->default('0,')->comment('所属级别分类路径ID');
            $table->tinyInteger('type_sort')->default('0')->comment('分类排序');

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
        Schema::dropIfExists('article_types');
    }
}
