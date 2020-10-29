<?php

namespace Qihucms\Search;

use \Qihucms\Search\Models\SearchKeyword as SearchKeywordModel;

class SearchKeyword
{
    /**
     * @param string $keyword
     * @return mixed
     */
    public function updateCount(string $keyword)
    {
        return SearchKeywordModel::where('keyword', $keyword)->increment('count');
    }
}