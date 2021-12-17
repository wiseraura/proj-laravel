<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\CategoryModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;

class IndexController
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

    public function index()
    {
        //ORM -> xử lý các câu truy vấn đơn giản
        $data = CategoryModel::select('id', 'name', 'status', 'is_home', 'display', 'created', 'created_by', 'modified', 'modified_by')
            ->orderBy('id','DESC')->get();

        // Dữ liệu trả về là 1 Collecttion

        return view(
            $this->pathViewController . 'index',[
                'listCategory' => $data
            ]
        );
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = ($request->status == "active") ? "inactive" : "active";

        CategoryModel::where('id', $id)
            ->update(['status' => $status]);

        return redirect()->route('admin.category')->with('notify', 'Cập nhật trạng thái thành công!');
    }

    public function isHome(Request $request)
    {
        $id = $request->id;
        $isHome = ($request->isHome == 1) ? 0 : 1;

        CategoryModel::where('id', $id)
            ->update(['is_home' => $isHome]);

        return redirect()->route('admin.category')->with('notify', 'Cập nhật trạng thái hiển thị trang chủ thành công!');
    }

    public function display(Request $request) {
        $id = $request->id;
        $display = $request->display;

        CategoryModel::where('id', $id)
            ->update(['display' => $display]);

        return redirect()->route('admin.category')->with("notify", "Cập nhật kiểu hiện thị thành công!");
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $itemSlider = CategoryModel::where('id', $id)->first();
        if (empty($itemSlider)) {
            $data['type']       = 'error';
            $data['title']      = 'Thất Bại';
            $data['content']    = 'Bạn không thể xóa danh mục không tồn tại!';
        } else {
            CategoryModel::where('id', $id)->delete();
            $this->thumbHelper->deleteThumb($itemSlider->thumb, 'slider');

            $data['type']       = 'success';
            $data['title']      = 'Thành Công';
            $data['content']    = 'Xóa danh mục thành công!';
        }

        return response()->json($data, 200);
    }
}
