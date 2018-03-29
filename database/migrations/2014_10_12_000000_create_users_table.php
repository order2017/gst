<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('user_id')->comment('用户ID');
            $table->string('user_name',45)->nullable()->comment('用户名称');
            $table->string('user_phone',32)->nullable()->unique()->comment('用户手机号');
            $table->string('password')->comment('用户密码');

            $table->tinyInteger('user_type')->default('0')->comment('用户类型');
            $table->tinyInteger('user_status')->default('0')->comment('用户状态');

            $table->string('wechat_number',32)->nullable()->comment('用户微信号');
            $table->string('openid')->nullable()->unique()->comment('微信OPENID');
            $table->string('nickname',32)->nullable()->comment('微信昵称');
            $table->text('headimgurl')->nullable()->comment('微信头像');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
