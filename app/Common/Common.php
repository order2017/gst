<?php

namespace App\Common;

use Illuminate\Pagination\LengthAwarePaginator;

class Common
{
    public $publicFunction;

    public $smsFunction;

    public $searchKey;

    /**
     * Common constructor.
     * @param PublicFunction $publicFunction
     * @param SmsFunction $smsFunction
     * @param SearchKey $searchKey
     */
    public function __construct(PublicFunction $publicFunction,SmsFunction $smsFunction,SearchKey $searchKey)
    {
        $this->publicFunction = $publicFunction;
        $this->smsFunction = $smsFunction;
        $this->searchKey = $searchKey;
    }

    /**
     * 数组分页
     * @param $list
     * @param string $perPage
     * @return LengthAwarePaginator
     */
    public static function arrayPage($list,$perPage="15") {

        $page = request('page','1');

        $offset = ($page * $perPage) - $perPage;

        $list = new LengthAwarePaginator(array_slice($list,$offset,$perPage,true),count($list),$perPage,$page,['path' => request()->url(), 'query' => request()->query()]);

        return $list;

    }

}
