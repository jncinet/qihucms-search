<?php

namespace Qihucms\Search\Controllers\Admin;

use App\Admin\Controllers\Controller;
use Qihucms\Search\Models\SearchKeyword;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class KeywordController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '搜索关键词';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SearchKeyword());

        $grid->model()->latest();

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->equal('type_uri', __('search::keyword.type_uri'));
            $filter->like('keyword', __('search::keyword.keyword'));
            $filter->between('created_at', __('admin.created_at'))->datetime();
        });

        $grid->column('id', __('search::keyword.id'));
        $grid->column('type_uri', __('search::keyword.type_uri'));
        $grid->column('keyword', __('search::keyword.keyword'));
        $grid->column('count', __('search::keyword.count'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(SearchKeyword::findOrFail($id));

        $show->field('id', __('search::keyword.id'));
        $show->field('type_uri', __('search::keyword.type_uri'));
        $show->field('keyword', __('search::keyword.keyword'));
        $show->field('count', __('search::keyword.count'));
        $show->field('created_at', __('admin.created_at'));
        $show->field('updated_at', __('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SearchKeyword());

        $form->text('type_uri', __('search::keyword.type_uri'))
            ->help(__('search::keyword.type_uri_help'));
        $form->text('keyword', __('search::keyword.keyword'))->required();
        $form->number('count', __('search::keyword.count'))->default(1);

        return $form;
    }
}
