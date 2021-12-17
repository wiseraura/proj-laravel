<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Models\SliderModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\SliderRequest;

class AddController
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

    public function add()
    {
        return view($this->pathViewController . 'add');
    }

    public function action(SliderRequest $request)
    {
        $params = $request->all();
        $params['created_by'] = "camnguyen";
        $params['created']    = date('Y-m-d');
        $params['thumb']      = $this->thumbHelper->uploadThumb($params['thumb'], 'slider');

        SliderModel::insert(array_diff_key($params, array_flip($this->crudNotAccepted)));

        return redirect()->route('admin.slider')->with("notify", "Thêm phần tử thành công!");
    }
}
