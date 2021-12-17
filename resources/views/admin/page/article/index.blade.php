@extends('admin.page.main')
@section('title', 'Quản Lý Bài Viết')

@section('style')
    <style type="text/css">
        a.align-items {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 10%;
        }
        .btn-icon {
            border-radius: 50%;
            padding: 4px 8px;
        }
        .clearfix { clear: both; }
    </style>
@endsection

@section('main-content')

    @include('admin.elements.breadcrumb', ['breadcrumbName' => ['Danh Sách Bài Viết']])

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border clearfix">
                <div style="float: left;"><h3 class="box-title">Danh sách</h3></div>
                <div style="float: right;">
                    <a href="{{ route('admin.article.add') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-lg table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 3%;">#</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30%;">Thông tin bài viết</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">Hình ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 8%;">Danh mục</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 12%;">Kiểu bài viết</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 15%;">Trạng thái</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 8%;">Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if (!empty($listArticle))
                                        @php $i = 1; @endphp
                                        @foreach($listArticle as $item)
                                            @php
                                                $status = config('default_config.template.status');
                                                $type = config('default_config.template.type');
                                            @endphp
                                            <tr role="row" class="odd">
                                                <td>{{ $i }}</td>
                                                <td class="sorting_1">
                                                    <p><strong>Name:</strong> {{ $item->name }}</p>
                                                    <p><strong>Content:</strong> {!! showContent($item->content) !!}</p>                                               
                                                </td>
                                                <td>
                                                    <img style="border-radius: 10px;" class="card-img" src="{{ asset('images/article/' . $item->thumb) }}" alt="{{ $item->name }}">
                                                </td>
                                                <td>
                                                    {{ $item->category->name }}
                                                </td>
                                                <td>
                                                    <select name="select_change_attr"
                                                            style="margin: 0;"
                                                            data-url="{{ route('admin.article.type', ['type' => 'value_new', 'id' => $item->id]) }}"
                                                            class="form-control selection">
                                                        @foreach($type as $key => $val)
                                                            <option value="{{ $key }}" {{ $item->type == $key ? 'selected' : '' }}>{{ $val['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.article.changeStatus', ['status' => $item->status, 'id' => $item->id]) }}"
                                                       type="button"
                                                       class="btn btn-round align-items {{ $status[$item->status]['class'] ?? '' }}"
                                                    >{{ $status[$item->status]['name'] ?? '' }}</a>
                                                </td>
                                                <td>
                                                    <div class="zvn-box-btn-filter">
                                                        <a href="{{ route('admin.article.edit', ['id' => $item->id]) }}" type="button" class="btn btn-icon btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                           type="button"
                                                           class="btn btn-icon btn-danger btn-delete deleteDialog"
                                                           data-id="{{ $item->id }}"
                                                           data-url="{{ route('admin.article.delete') }}"
                                                           data-toggle="tooltip"
                                                           data-placement="top"
                                                           data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                    @endif

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">#</th>
                                        <th rowspan="1" colspan="1">Hình Ảnh</th>
                                        <th rowspan="1" colspan="1">Trạng Thái</th>
                                        <th rowspan="1" colspan="1">Tạo Mới</th>
                                        <th rowspan="1" colspan="1">Chỉnh sửa</th>
                                        <th rowspan="1" colspan="1">Hành Động</th>
                                    </tr>
                                    </tfoot>
                                </table>
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
    <script type="text/javascript">
        $(document).ready(function () {

            $("select[name = select_change_attr]").on('change', function() {
                let select_value = $(this).val();
                let $url = $(this).data('url');
                window.location.href = $url.replace('value_new', select_value);
            });

            $("a.deleteDialog").click(function () {
                var id = $(this).data('id');
                var url = $(this).data('url');

                Swal.fire({
                    type: 'question',
                    title: 'Thông báo',
                    text: 'Bạn có chắc muốn xóa bài viết này?',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return fetch(url, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            body: JSON.stringify({'id': id}),
                        })
                            .then(response => {
                                if (!response.ok) {
                                    console.log(response);
                                    throw new Error('Xóa bài viết thất bại!');
                                }
                                return response.json();
                            })
                            .catch(error => {
                                Swal.showValidationMessage(error);

                                Swal.update({
                                    type: 'error',
                                    title: 'Thất Bại',
                                    text: '',
                                    showConfirmButton: false,
                                    cancelButtonText: 'Ok',
                                });
                            })
                    },
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            type: result.value.type,
                            title: result.value.title,
                            text: result.value.content,
                        }).then((result) => {
                            if (result.value)
                                location.reload(true);
                        });
                    }
                })
            });
        });
    </script>
@endsection
