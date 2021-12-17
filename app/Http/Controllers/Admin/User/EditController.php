<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Helper\ThumbHelper;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Facades\Hash;

class EditController
{
    private $pathViewController = "admin.page.user.";
    private $sliderModel;
    private $thumbHelper;
    protected $crudNotAccepted     = [
        '_token',
        'avatar_current',
        'id',
        'task'
    ];

    public function __construct(ThumbHelper $thumbHelper)
    {
        $this->thumbHelper = $thumbHelper;
    }

    public function edit(Request $request)
    {
        $user = UserModel::select('id', 'username', 'email', 'status', 'fullname', 'level', 'avatar')
            ->where('id', $request->id)->first();

        return view($this->pathViewController . 'edit', [
            'user' => $user
        ]);
    }

    public function action(UserRequest $request)
    {
        $params = $request->all();

        $params['modified_by'] = Auth::user()->username;
        $params['modified'] = date('Y-m-d');

        if(!empty($params['avatar'])) {
            $this->thumbHelper->deleteThumb($params['avatar_current'], 'user');
            $params['avatar'] = $this->thumbHelper->uploadThumb($params['avatar'], 'user');
        }

        $dataUpdate = array_diff_key($params, array_flip($this->crudNotAccepted));
        UserModel::where('id', $params['id'])->update($dataUpdate);

        return redirect()->route('admin.user')->with("notify", "Chỉnh sửa phần tử thành công!");
    }

    public function changePassword(UserRequest $request)
    {
        $params = $request->all();
        UserModel::where('id', $params['id'])->update(['password' => Hash::make($params['password'])]);

        return redirect()->route('admin.user')->with("notify", "Thay đổi mật khẩu thành công!");
    }

    public function changeLevel(UserRequest $request)
    {
        $params = $request->all();
        UserModel::where('id', $params['id'])->update(['level' => $params['level']]);

        return redirect()->route('admin.user')->with("notify", "Thay đổi quyền người dùng thành công!");
    }
}
