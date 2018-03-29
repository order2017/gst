<?php

namespace App\Common;

use Illuminate\Pagination\LengthAwarePaginator;

class Common
{
    public $publicFunction;

    /**
     * Common constructor.
     * @param $publicFunction
     */
    public function __construct(PublicFunction $publicFunction)
    {
        $this->publicFunction = $publicFunction;
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
