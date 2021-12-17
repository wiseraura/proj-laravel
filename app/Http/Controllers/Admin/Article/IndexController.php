<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\ArticleModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;

class IndexController
{
    private $pathViewController = "admin.page.article.";
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

    public function index()
    {
        $data = ArticleModel::select('id', 'category_id', 'name', 'status', 'content', 'thumb', 'type', 'created', 'created_by', 'modified', 'modified_by')
            ->with([
                'category' => function ($query) {
                    $query->select('id', 'name');
                },
            ])->orderBy('id','DESC')->get();

        return view(
            $this->pathViewController . 'index',[
                'listArticle' => $data
            ]
        );
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = ($request->status == "active") ? "inactive" : "active";

        ArticleModel::where('id', $id)
            ->update(['status' => $status]);

        return redirect()->route('admin.article')->with('notify', 'Cập nhật trạng thái thành công!');
    }

    public function type(Request $request) {
        $id = $request->id;
        $type = $request->type;

        ArticleModel::where('id', $id)
            ->update(['type' => $type]);

        return redirect()->route('admin.article')->with("notify", "Cập nhật kiểu hiện thị thành công!");
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $itemArticle = ArticleModel::where('id', $id)->first();
        if (empty($itemArticle)) {
            $data['type']       = 'error';
            $data['title']      = 'Thất Bại';
            $data['content']    = 'Bạn không thể xóa bài viết không tồn tại!';
        } else {
            ArticleModel::where('id', $id)->delete();
            $this->thumbHelper->deleteThumb($itemArticle->thumb, 'user');

            $data['type']       = 'success';
            $data['title']      = 'Thành Công';
            $data['content']    = 'Xóa người dùng thành công!';
        }

        return response()->json($data, 200);
    }
}
