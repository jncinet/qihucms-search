<?php

namespace Qihucms\Search\Controllers\Api;

use App\Http\Controllers\Controller;
use Qihucms\Search\Resources\KeywordCollection;
use Qihucms\Search\Models\SearchKeyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    /**
     * 关键词列表
     *
     * @param Request $request
     * @return KeywordCollection
     */
    public function index(Request $request)
    {
        $type_uri = $request->get('t');
        $keyword = $request->get('kw');
        $limit = $request->get('limit', 12);

        $model = new SearchKeyword();

        if ($type_uri) {
            $model = $model->where('type_uri', $type_uri);
        }

        if ($keyword) {
            $model = $model->where('votes', 'like', '%' . $keyword . '%');
        }

        $model = $model->orderBy('count', 'desc')->simplePaginate($limit);

        return new KeywordCollection($model);
    }
}
