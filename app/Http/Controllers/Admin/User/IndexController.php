<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\UserModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;

class IndexController
{
    private $pathViewController = "admin.page.user.";
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
        $data = UserModel::select('id', 'username', 'email', 'fullname', 'avatar', 'status', 'level','created', 'created_by', 'modified', 'modified_by')
            ->orderBy('id','DESC')->get();

        return view(
            $this->pathViewController . 'index', [
                'listUser' => $data
            ]
        );
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = ($request->status == "active") ? "inactive" : "active";

        UserModel::where('id', $id)
            ->update(['status' => $status]);

        return redirect()->route('admin.user')->with('notify', 'Cập nhật trạng thái thành công!');
    }

    public function level(Request $request) {
        $id = $request->id;
        $level = $request->level;

        UserModel::where('id', $id)
            ->update(['level' => $level]);

        return redirect()->route('admin.user')->with("notify", "Cập nhật quyền người dùng thành công!");
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $itemArticle = UserModel::where('id', $id)->first();
        if (empty($itemArticle)) {
            $data['type']       = 'error';
            $data['title']      = 'Thất Bại';
            $data['content']    = 'Bạn không thể xóa bài viết không tồn tại!';
        } else {
            UserModel::where('id', $id)->delete();
            $this->thumbHelper->deleteThumb($itemArticle->thumb, 'article');

            $data['type']       = 'success';
            $data['title']      = 'Thành Công';
            $data['content']    = 'Xóa bài viết thành công!';
        }

        return response()->json($data, 200);
    }
}
