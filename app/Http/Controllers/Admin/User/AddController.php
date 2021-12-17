<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Helper\ThumbHelper;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Facades\Hash;

class AddController
{
    private $pathViewController = "admin.page.user.";
    private $thumbHelper;
    protected $crudNotAccepted     = [
        '_token',
        'avatar_current',
        'password_confirmation',
    ];

    public function __construct(ThumbHelper $thumbHelper)
    {
        $this->thumbHelper = $thumbHelper;
    }

    public function add()
    {
        return view($this->pathViewController . 'add');
    }

    public function action(UserRequest $request)
    {
        $params = $request->all(); //respone dữ liệu sau khi chuẩn hóa
        $params['created_by'] = Auth::user()->username;
        $params['created'] = date('Y-m-d');
        $params['avatar'] = $this->thumbHelper->uploadThumb($params['avatar'], 'user');
        $params['password'] = Hash::make($params['password']);

        UserModel::insert(array_diff_key($params, array_flip($this->crudNotAccepted)));

        return redirect()->route('admin.user')->with("notify", "Thêm phần tử thành công!");
    }
}
