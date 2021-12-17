<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Models\SliderModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\SliderRequest;

class EditController
{
    private $pathViewController = "admin.page.slider.";
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

        $data = SliderModel::select('id', 'name', 'description', 'status', 'link', 'thumb')
            ->where('id', $request->id)
            ->first();
        return view($this->pathViewController . 'edit', ['slider' => $data]);
    }

    public function action(SliderRequest $request)
    {
        $params = $request->all();

        $params['modified_by'] = "camnguyen";
        $params['modified'] = date('Y-m-d');

        if(!empty($params['thumb'])) {
            $this->thumbHelper->deleteThumb($params['thumb_current'], 'slider');
            $params['thumb'] = $this->thumbHelper->uploadThumb($params['thumb'], 'slider');
        }

        $dataUpdate = array_diff_key($params, array_flip($this->crudNotAccepted));
        SliderModel::where('id', $params['id'])->update($dataUpdate);

        return redirect()->route('admin.slider')->with("notify", "Chính sửa phần tử thành công!");
    }
}
