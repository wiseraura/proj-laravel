<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Models\SliderModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;

class IndexController
{
    private $pathViewController = "admin.page.slider.";
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
        $data = SliderModel::select('id', 'name', 'description', 'link', 'thumb', 'created', 'created_by', 'modified', 'modified_by', 'status')
            ->orderBy('id','DESC')->get();

        return view(
            $this->pathViewController . 'index',
            ['listSliders' => $data]
        );
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = ($request->status == "active") ? "inactive" : "active";

        SliderModel::where('id', $id)
            ->update(['status' => $status]);

        return redirect()->route('admin.slider')->with('notify', 'Cập nhật trạng thái thành công!');
    }

    public function delete(Request $request)
    {
        $param['id'] = $request->id;

        $itemSlider = SliderModel::where('id', $param['id'])->first();
        if (empty($itemSlider)) {
            $data['type']       = 'error';
            $data['title']      = 'Thất Bại';
            $data['content']    = 'Bạn không thể xóa quảng cáo không tồn tại!';
        } else {
            SliderModel::where('id', $param['id'])->delete();
            $this->thumbHelper->deleteThumb($itemSlider->thumb, 'slider');

            $data['type']       = 'success';
            $data['title']      = 'Thành Công';
            $data['content']    = 'Xóa quảng cáo thành công!';
        }

        return response()->json($data, 200);
    }
}
