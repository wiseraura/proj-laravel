<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use Helper\ThumbHelper;
use App\Http\Requests\Article\UserRequest;

class AddController
{
    private $pathViewController = "admin.page.article.";
    private $thumbHelper;
    protected $crudNotAccepted     = [
        '_token',
        'thumb_current',
    ];

    public function __construct(ThumbHelper $thumbHelper)
    {
        $this->thumbHelper = $thumbHelper;
    }

    public function add()
    {
        $categories = CategoryModel::select('id', 'name')
            ->orderBy('name', 'asc')
            ->where('status', '=', 'active')->get();

        return view($this->pathViewController . 'add', [
            'categories' => $categories
        ]);
    }

    public function action(UserRequest $request)
    {
        $params = $request->all();
        $params['created_by'] = "camnguyen";
        $params['created'] = date('Y-m-d');
        $params['thumb'] = $this->thumbHelper->uploadThumb($params['thumb'], 'article');

        ArticleModel::insert(array_diff_key($params, array_flip($this->crudNotAccepted)));

        return redirect()->route('admin.article')->with("notify", "Thêm phần tử thành công!");
    }
}
