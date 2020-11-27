@extends('backend.layouts.master')
@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
{{--                bao loi session--}}
                @if(session()->has('success'))
                    <span style="color: green">{{session()->get('success')}}</span>
                @else
                    <span style="color: red">{{session()->get('error')}}</span>
                @endif
{{--                ket thuc bao loi session--}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <!-- Content -->
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Số lượng sản phẩm <a href="#" style="color: red!important;"> {{$products_number}}</a></h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh muc</th>
                                <th>Show Bình Luận</th>
                                <th>Trạng thái</th>
                                <th>Images</th>
                                <th>Chỉnh sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td><a href="#">Show</a></td>
                                <td>

                                        @if($product->status==0)
                                        Đang Nhập
                                        @elseif($product->status==1)
                                            Mở bán
                                        @elseif($product->status==-1)
                                            Hết hàng
                                            @endif

                                </td>

                                <td><a href="{{route('backend.product.show',$product->id)}}">Show</a></td>
{{--                                @can('update', $product)--}}
                                <td>
                                    <a href="{{route('backend.product.edit',$product->id)}}" class="btn btn-success">Chỉnh sửa</a>
                                </td>


                                <td>
                                    <form action="{{route('backend.product.destroy',$product->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i> Xoá
                                        </button>
                                    </form>
                                </td>
{{--                                @endcan--}}
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
