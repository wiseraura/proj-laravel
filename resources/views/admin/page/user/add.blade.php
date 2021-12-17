@extends('admin.page.main')
@section('title', 'Thêm Người Dùng Mới')

@section('style')
    <style type="text/css">
        .error #cke_1_top {
            background: #fdd;
        }
    </style>
@endsection

@section('main-content')
    @include('admin.elements.breadcrumb', ['breadcrumbName' => ['Thêm Người Dùng Mới']])

    <section class="content">
        @include ('admin.elements.validate_error')
        <div class="box">
            <div class="box-header with-border clearfix">
                <div style="float: left;"><h3 class="box-title">Thêm Người Dùng Mới</h3></div>
                <div style="float: right;">
                    <a href="{{ route('admin.user') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay Về</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('admin.user.add.action') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                    {{ @csrf_field() }}

                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Username</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('username') ? 'error' : ''}}" type="text" name="username" value="{{ old('username') ?? '' }}" readonly>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Email</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('email') ? 'error' : ''}}" type="text" name="email" value="{{ old('email') ?? '' }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Fullname</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('fullname') ? 'error' : ''}}" type="text" name="fullname" value="{{ old('fullname') ?? '' }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
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
                                        <label class="col-form-label col-md-2">Level</label>
                                        <div class="col-md-5">
                                            <select class="form-control {{ $errors->has('level') ? 'error' : ''}}" name="level" id="level">
                                                <option value="">=== Select Level ===</option>
                                                <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Quản trị hệ thống</option>
                                                <option value="member" {{ old('level') == 'member' ? 'selected' : '' }}>Người dùng bình thường</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Status</label>
                                        <div class="col-md-5">
                                            <select class="form-control {{ $errors->has('status') ? 'error' : ''}}" name="status" id="status">
                                                <option value="">=== Select Status ===</option>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : 'default' }}>Kích hoạt</option>
                                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : 'default' }}>Chưa kích hoạt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Avatar</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('avatar') ? 'error' : ''}}" type="file" name="avatar">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin/assets/vendor_components/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
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
