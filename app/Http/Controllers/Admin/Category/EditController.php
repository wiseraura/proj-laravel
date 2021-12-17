<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\CategoryModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;
use App\Http\Requests\Category\ArticleRequest;

class EditController
{
    private $pathViewController = "admin.page.category.";
    private $sliderModel;
    private $thumbHelper;
    protected $crudNotAccepted     = [
        '_token',
        'thumb_current',
        'id'
    ];

    public function __construct(ThumbHelper $thumbHelper)
    {
        $this->thumbHelper = $thumbHelper;
    }

    public function edit(Request $request)
    {
        $data = CategoryModel::select('id', 'name', 'status')
            ->where('id', $request->id)
            ->first();

        return view($this->pathViewController . 'edit', ['category' => $data]);
    }

    public function action(ArticleRequest $request)
    {
        $params = $request->all();

        $params['modified_by'] = "camnguyen";
        $params['modified'] = date('Y-m-d');

        $dataUpdate = array_diff_key($params, array_flip($this->crudNotAccepted));
        CategoryModel::where('id', $params['id'])->update($dataUpdate);

        return redirect()->route('admin.category')->with("notify", "Chỉnh sửa phần tử thành công!");
    }
}
