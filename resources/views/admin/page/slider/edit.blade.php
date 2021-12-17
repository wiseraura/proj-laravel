@extends('admin.page.main')
@section('title', 'Chỉnh Sửa Quảng Cáo')

@section('main-content')
    @include('admin.elements.breadcrumb', ['breadcrumbName' => ['Chỉnh Sửa Quảng Cáo']])

    <section class="content">
        @include ('admin.elements.validate_error')
        <div class="box">
            <div class="box-header with-border clearfix">
                <div style="float: left;"><h3 class="box-title">Chỉnh Sửa Quảng Cáo</h3></div>
                <div style="float: right;">
                    <a href="{{ route('admin.slider') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay Về</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('admin.slider.edit.action') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                    {{ @csrf_field() }}

                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Name</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('name') ? 'error' : ''}}" type="text" name="name" value="{{ old('title') ?? $slider->name }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Description</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('description') ? 'error' : ''}}" type="text" name="description" value="{{ old('title') ?? $slider->description }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Status</label>
                                        <div class="col-md-5">
                                            <select class="form-control {{ $errors->has('status') ? 'error' : ''}}" name="status" id="status">
                                                <option value="">=== Select Status ===</option>
                                                <option value="active" @if (old('status') == NULL) {{ ($slider->status == 'active') ? 'selected' : '' }} @else {{ old('status') == 'active' ? 'selected' : '' }} @endif>Kích hoạt</option>
                                                <option value="inactive" @if (old('status') == NULL) {{ ($slider->status == 'inactive') ? 'selected' : '' }} @else {{ old('status') == 'inactive' ? 'selected' : '' }} @endif>Chưa kích hoạt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Link</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('link') ? 'error' : ''}}" type="text" name="link" value="{{ old('title') ?? $slider->link }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Thumb</label>
                                        <div class="col-md-5">
                                            <input class="form-control" type="file" name="thumb">
                                            <div class="carousel-item active" style="margin-left: 10px; margin-top: 15px;">
                                                <img src="{{ asset('images/slider/' . $slider->thumb) }}" class="img-fluid" alt="slide-2">
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

                                    <input type="hidden" name="id" value="{{ $slider->id }}" />
                                    <input type="hidden" name="thumb_current" value="{{ $slider->thumb }}" />

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
