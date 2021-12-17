<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;
use App\Http\Requests\Article\UserRequest;

class EditController
{
    private $pathViewController = "admin.page.article.";
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
        $article = ArticleModel::select('id', 'name', 'content', 'status', 'thumb', 'category_id')
            ->where('id', $request->id)->first();

        $categories = CategoryModel::select('id', 'name')
            ->orderBy('name', 'asc')
            ->where('status', '=', 'active')->get();

        return view($this->pathViewController . 'edit', [
            'categories' => $categories,
            'article' => $article
        ]);
    }

    public function action(UserRequest $request)
    {
        $params = $request->all();

        $params['modified_by'] = "camnguyen";
        $params['modified'] = date('Y-m-d');

        if(!empty($params['thumb'])) {
            $this->thumbHelper->deleteThumb($params['thumb_current'], 'article');
            $params['thumb'] = $this->thumbHelper->uploadThumb($params['thumb'], 'article');
        }

        $dataUpdate = array_diff_key($params, array_flip($this->crudNotAccepted));
        ArticleModel::where('id', $params['id'])->update($dataUpdate);

        return redirect()->route('admin.article')->with("notify", "Chỉnh sửa phần tử thành công!");
    }
}
