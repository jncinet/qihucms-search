<?php

use Illuminate\Routing\Router;

// 接口
Route::group([
    'prefix' => config('qihu.search_prefix', 'search'),
    'namespace' => 'Qihucms\Search\Controllers\Api',
    'middleware' => ['api'],
], function (Router $router) {
    $router->get('keywords', 'KeywordController@index')->name('api.search.keyword.index');
});

// 后台管理
Route::group([
    'prefix' => config('admin.route.prefix') . '/search',
    'namespace' => 'Qihucms\Search\Controllers\Admin',
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.'
], function (Router $router) {
    // 关键词
    $router->resource('keywords', 'KeywordController');
});