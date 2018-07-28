<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'sc_name',
        'sc_add',
        'sc_person',
        'sc_tel',
        'sc_time',

        'sc_fw',
        'sc_syzx',
        'sc_sq',
        'sc_cjdc',
        'sc_jtms',

        'sc_cdqk',
        'sc_htqx',
        'sc_bd',
        'sc_kl',
        'sc_bzj',
        'sc_jcf',
        'sc_dqf',
        'sc_glf',
        'sc_cxf',
        'sc_dzf',
        'sc_qtf',
        'sc_htms',

        'sc_status',

        'user_id',
    ];
}
