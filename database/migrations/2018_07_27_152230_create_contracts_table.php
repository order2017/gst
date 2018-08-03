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

        // 商业招商签约
        Schema::create('one_contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('qy_cy')->nullable()->comment('餐饮');
            $table->string('qy_js')->nullable()->comment('健身');
            $table->string('qy_mrys')->nullable()->comment('美容养生');
            $table->string('qy_dyy')->nullable()->comment('电影院');
            $table->string('qy_jypx')->nullable()->comment('教育培训');
            $table->string('qy_jd')->nullable()->comment('酒店');
            $table->string('qy_bg')->nullable()->comment('宾馆');
            $table->string('qy_qt')->nullable()->comment('其它');
            $table->string('qy_zq')->nullable()->comment('租期');
            $table->string('qy_zj')->nullable()->comment('租金');
            $table->string('qy_yj')->nullable()->comment('押金');
            $table->string('qy_mzq')->nullable()->comment('免租期');
            $table->string('qy_jybz')->nullable()->comment('交付标准');
            $table->string('qy_jse')->nullable()->comment('其它');

            $table->string('qy_sctp')->nullable()->comment('图片');

            $table->integer('qy_status')->default(1)->comment('审核状态');

            $table->integer('user_id')->comment('用户ID');

            $table->timestamps();
        });

        // 商场买卖签约
        Schema::create('two_contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('qy_sczq')->nullable()->comment('商场租期');
            $table->string('qy_scmc')->nullable()->comment('商场名称');
            $table->string('qy_shzq')->nullable()->comment('商户租期');
            $table->string('qy_scjzj')->nullable()->comment('商场交租金');
            $table->string('qy_shszj')->nullable()->comment('商户收租金');
            $table->string('qy_scjyj')->nullable()->comment('商场交押金');
            $table->string('qy_shsyj')->nullable()->comment('商户收押金');
            $table->string('qy_scmj')->nullable()->comment('商场面积');
            $table->string('qy_shmj')->nullable()->comment('商户面积');
            $table->string('qy_sczrf')->nullable()->comment('商场转让费');
            $table->string('qy_qt')->nullable()->comment('其它');

            $table->string('qy_sctp')->nullable()->comment('图片');

            $table->integer('qy_status')->default(1)->comment('审核状态');

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
        Schema::dropIfExists('one_contracts');
        Schema::dropIfExists('two_contracts');
    }
}
