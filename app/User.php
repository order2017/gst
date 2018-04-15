<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    const IS_USER = 30;

    const USER_TYPE_ONE = 0;
    const USER_TYPE_TWO = 1;
    const USER_TYPE_THREE = 2;

    use Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'user_phone',
        'password',
        'user_type',
        'user_status',
        'user_money',
        'user_number',
        'wechat_number',
        'openid',
        'nickname',
        'headimgurl',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * @return array
     */
    public static function UserTypeList()
    {
        return [
            self::USER_TYPE_ONE => '普通会员',
            self::USER_TYPE_TWO => 'VIP会员',
            self::USER_TYPE_THREE => '代理会员',
        ];
    }

    /**
     * @return mixed|string
     */
    public function getUserTypeTextAttribute()
    {
        return empty($this->user_type) ? '普通会员' : self::UserTypeList()[$this->user_type];
    }

    /**
     * @return string
     */
    public function getUserMoneyAttribute() {

        if (empty($this->attributes['user_money'])) {
            return "0";
        }else{
            return $this->attributes['user_money'];
        }
    }

    /**
     * @return string
     */
    public function getUserNumberAttribute() {
        if (empty($this->attributes['user_number'])) {
            return "0";
        }else{
            return $this->attributes['user_number'];
        }
    }

}
