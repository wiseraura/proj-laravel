@extends('admin.page.main')
@section('title', 'Chỉnh Sửa Danh Mục')

@section('main-content')
    @include('admin.elements.breadcrumb', ['breadcrumbName' => ['Chỉnh Sửa Danh Mục']])

    <section class="content">
        @include ('admin.elements.validate_error')

        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-header with-border clearfix">
                        <div style="float: left;"><h3 class="box-title">Chỉnh Sửa Danh Mục</h3></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="{{ route('admin.user.edit.action') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                            {{ @csrf_field() }}

                                            <div class="form-group row">
                                                <div class="col-md-2"></div>
                                                <label class="col-form-label col-md-2">Username</label>
                                                <div class="col-md-5">
                                                    <input class="form-control {{ $errors->has('username') ? 'error' : ''}}" type="text" name="username" value="{{ old('username', $user->username) ?? '' }}" readonly>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2"></div>
                                                <label class="col-form-label col-md-2">Email</label>
                                                <div class="col-md-5">
                                                    <input class="form-control {{ $errors->has('email') ? 'error' : ''}}" type="text" name="email" value="{{ old('email', $user->email) ?? '' }}">
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2"></div>
                                                <label class="col-form-label col-md-2">Fullname</label>
                                                <div class="col-md-5">
                                                    <input class="form-control {{ $errors->has('fullname') ? 'error' : ''}}" type="text" name="fullname" value="{{ old('fullname', $user->fullname) ?? '' }}">
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2"></div>
                                                <label class="col-form-label col-md-2">Status</label>
                                                <div class="col-md-5">
                                                    <select class="form-control {{ $errors->has('status') ? 'error' : ''}}" name="status" id="status">
                                                        <option value="">=== Select Status ===</option>
                                                        <option value="active" @if (old('status') == NULL) {{ ($user->status == 'active') ? 'selected' : '' }} @else {{ old('status') == 'active' ? 'selected' : '' }} @endif>Kích hoạt</option>
                                                        <option value="inactive" @if (old('status') == NULL) {{ ($user->status == 'inactive') ? 'selected' : '' }} @else {{ old('status') == 'inactive' ? 'selected' : '' }} @endif>Chưa kích hoạt</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2"></div>
                                                <label class="col-form-label col-md-2">Avatar</label>
                                                <div class="col-md-5">
                                                    <input class="form-control" type="file" name="avatar">
                                                    <div class="carousel-item active" style="margin-left: 10px; margin-top: 15px;">
                                                        <img src="{{ asset('images/user/' . $user->avatar) }}" class="img-fluid" alt="{{ $user->avatar }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2"></div>
                                                <label class="col-form-label col-md-2"></label>
                                                <div class="col-md-5">
                                                    <input class="form-control btn btn-success" type="submit" value="Save">
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>

                                            <input type="hidden" name="id" value="{{ $user->id }}" />
                                            <input type="hidden" name="avatar_current" value="{{ $user->avatar }}" />
                                            <input type="hidden" name="task" value="edit-info" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="box">
                        <div class="box-header with-border clearfix">
                            <div style="float: left;"><h3 class="box-title">Thay Đổi Mật Khẩu</h3></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form action="{{ route('admin.user.edit.changePassword') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                                {{ @csrf_field() }}

                                                <div class="form-group row">
                                                    <div class="col-md-2"></div>
                                                    <label class="col-form-label col-md-2">Password</label>
                                                    <div class="col-md-5">
                                                        <input class="form-control {{ $errors->has('password') ? 'error' : ''}}" type="password" name="password" value="{{ old('password') ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2"></div>
                                                    <label class="col-form-label col-md-2">Password Confirmation</label>
                                                    <div class="col-md-5">
                                                        <input class="form-control {{ $errors->has('password_confirmation') ? 'error' : ''}}" type="password" name="password_confirmation" value="{{ old('password_confirmation') ?? '' }}">
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2"></div>
                                                    <label class="col-form-label col-md-2"></label>
                                                    <div class="col-md-5">
                                                        <input class="form-control btn btn-success" type="submit" value="Save">
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>

                                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                                <input type="hidden" name="task" value="change-password" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box">
                        <div class="box-header with-border clearfix">
                            <div style="float: left;"><h3 class="box-title">Quyền Truy Cập</h3></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form action="{{ route('admin.user.edit.changeLevel') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                                {{ @csrf_field() }}

                                                <div class="form-group row">
                                                    <div class="col-md-2"></div>
                                                    <label class="col-form-label col-md-2">Level</label>
                                                    <div class="col-md-5">
                                                        <select class="form-control {{ $errors->has('level') ? 'error' : ''}}" name="level" id="level">
                                                            <option value="">=== Select Level ===</option>
                                                            <option value="admin" {{ old('level', $user->level) == 'admin' ? 'selected' : '' }}>Quản trị hệ thống</option>
                                                            <option value="member" {{ old('level', $user->level) == 'member' ? 'selected' : '' }}>Người dùng bình thường</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2"></div>
                                                    <label class="col-form-label col-md-2"></label>
                                                    <div class="col-md-5">
                                                        <input class="form-control btn btn-success" type="submit" value="Save">
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>

                                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                                <input type="hidden" name="task" value="change-level" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            $("input[name=email]").keyup('change', function() {
                var value = $(this).val();
                var result = value.split('@')[0];
                $("input[name=username]").val(result);
            });

        });
    </script>
@endsection
