<?php

namespace App\Common;


class SearchKey
{
    /**
     * @param $queryData
     * @param array $SearchKey
     * @param $pageLimit
     * @param null $request
     * @return mixed
     */
    public function Search($queryData,$SearchKey=[],$pageLimit,$request=null) {

        $limit = empty($request) ? $pageLimit : $request;

        $searchKey = $SearchKey;

        $query = $queryData;

        $search = [];

        foreach ($searchKey as $key) {

            $search[$key] = request()->input($key);

            $query->where($key, 'like', '%' . request()->input($key) . '%');

        }

        return  $query->paginate($limit);
    }

}