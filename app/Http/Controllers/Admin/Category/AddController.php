<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\CategoryModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;
use App\Http\Requests\Category\ArticleRequest;

class AddController
{
    private $pathViewController = "admin.page.category.";
    private $sliderModel;
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
        return view($this->pathViewController . 'add');
    }

    public function action(ArticleRequest $request)
    {
        $params = $request->all();
        $params['is_home'] = 1;
        $params['display'] = 'grid';
        $params['created_by'] = "camnguyen";
        $params['created']    = date('Y-m-d');

        CategoryModel::insert(array_diff_key($params, array_flip($this->crudNotAccepted)));

        return redirect()->route('admin.category')->with("notify", "Thêm phần tử thành công!");
    }
}
