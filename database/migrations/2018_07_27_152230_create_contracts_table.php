<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('sc_name')->nullable()->comment('商场名称');
            $table->string('sc_add')->nullable()->comment('详细地址');
            $table->string('sc_person')->nullable()->comment('联系人');
            $table->string('sc_tel')->nullable()->comment('联系电话');
            $table->string('sc_time')->nullable()->comment('开店时间');

            $table->string('sc_fw')->nullable()->comment('方位');
            $table->string('sc_syzx')->nullable()->comment('商业中心');
            $table->string('sc_sq')->nullable()->comment('社区');
            $table->string('sc_cjdc')->nullable()->comment('城郊结合部-档次');
            $table->text('sc_jtms')->nullable()->comment('具体描述');

            $table->string('sc_cdqk')->nullable()->comment('场地情况');
            $table->string('sc_htqx')->nullable()->comment('合同期限');
            $table->string('sc_bd')->nullable()->comment('保底');
            $table->string('sc_kl')->nullable()->comment('扣率');
            $table->string('sc_bzj')->nullable()->comment('保证金');
            $table->string('sc_jcf')->nullable()->comment('进场费');
            $table->string('sc_dqf')->nullable()->comment('店庆费');
            $table->string('sc_glf')->nullable()->comment('管理费');
            $table->string('sc_cxf')->nullable()->comment('促销费');
            $table->string('sc_dzf')->nullable()->comment('店杂费');
            $table->string('sc_qtf')->nullable()->comment('其它费');
            $table->text('sc_htms')->nullable()->comment('具体描述');

            $table->integer('sc_status')->default(1)->comment('审核状态');

            $table->integer('user_id')->comment('用户ID');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
