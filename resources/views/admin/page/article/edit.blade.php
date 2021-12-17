@extends('admin.page.main')
@section('title', 'Chỉnh Sửa Danh Mục')

@section('style')
    <style type="text/css">
        .error #cke_1_top {
            background: #fdd;
        }
    </style>
@endsection

@section('main-content')
    @include('admin.elements.breadcrumb', ['breadcrumbName' => ['Chỉnh Sửa Danh Mục']])

    <section class="content">
        @include ('admin.elements.validate_error')
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
                                <form action="{{ route('admin.article.edit.action') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                    {{ @csrf_field() }}

                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Name</label>
                                        <div class="col-md-5">
                                            <input class="form-control {{ $errors->has('name') ? 'error' : ''}}" type="text" name="name" value="{{ old('title', $article->name) ?? '' }}">
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Description</label>
                                        <div class="col-md-5 ml-10 {{ $errors->has('content') ? 'error' : ''}}">
                                            <textarea name="content" cols="100" rows="10" id="content" class="form-control col-md-6 col-xs-12 ckeditor">
                                                {!! old('content', $article->content) ?? '' !!}
                                            </textarea>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Status</label>
                                        <div class="col-md-5">
                                            <select class="form-control {{ $errors->has('status') ? 'error' : ''}}" name="status" id="status">
                                                <option value="">=== Select Status ===</option>
                                                <option value="active" @if (old('status') == NULL) {{ ($article->status == 'active') ? 'selected' : '' }} @else {{ old('status') == 'active' ? 'selected' : '' }} @endif>Kích hoạt</option>
                                                <option value="inactive" @if (old('status') == NULL) {{ ($article->status == 'inactive') ? 'selected' : '' }} @else {{ old('status') == 'inactive' ? 'selected' : '' }} @endif>Chưa kích hoạt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Category</label>
                                        <div class="col-md-5">
                                            <select name="category_id" class="form-control {{ $errors->has('category_id') ? 'error' : ''}}" id="category_id">
                                                <option value="">=== Select Category ===</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : 'default' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <label class="col-form-label col-md-2">Thumb</label>
                                        <div class="col-md-5">
                                            <input class="form-control" type="file" name="thumb">
                                            <div class="carousel-item active" style="margin-left: 10px; margin-top: 15px;">
                                                <img src="{{ asset('images/article/' . $article->thumb) }}" class="img-fluid" alt="slide-2">
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

                                    <input type="hidden" name="id" value="{{ $article->id }}" />
                                    <input type="hidden" name="thumb_current" value="{{ $article->thumb }}" />

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
@endsection
