@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{config('app.url_admin')}}">{{__('Trang chủ')}}</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách thương hiệu của sản phẩm.</h3>
                                <a href="{{route('admin.brands.create')}}" class="btn btn-success float-right" title="{{__('Thêm mới thương hiệu')}}">{{__('Thêm mới thương hiệu')}}</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered dt-responsive" style="table-layout: fixed;width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Đường dẫn</th>
                                        <th>Cập nhật</th>
                                        <th>Trạng thái</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i= 0; @endphp
                                    @foreach($brands as $key => $brand)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img class="img-circle img-size-50 mr-2" alt="{{__('Logo')}}" src="{{$brand->image}}" data-holder-rendered="true" style="object-fit: cover;"></td>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$brand->slug}}</td>
                                            <td>{{$brand->updated_at}}</td>
                                            <td>{!! \App\Helpers\Helper::active($brand->active) !!}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm btn-show" data-url="{{route('admin.brands.show', $brand->slug)}}" data-toggle="modal" data-target="#show"><i class="fas fa-eye"></i></button>
                                                <a class="btn btn-info btn-sm btn-edit" href="{{route('admin.brands.edit', $brand->slug)}}"><i class="fas fa-pencil-alt"></i></a>
                                                <button class="btn btn-danger btn-sm btn-delete" data-url="brands/destroy" onclick="removeFunction('{{$brand->slug}}')"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Đường dẫn</th>
                                        <th>Cập nhật</th>
                                        <th>Trạng thái</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('stylesheets')
    <!-- DataTables -->

    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manage/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('manage/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('manage/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('manage/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('manage/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('manage/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('manage/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('manage/dist/js/pages/datatable.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('manage/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
