@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
                {{--                bao loi session--}}
                @if(session()->has('success'))
                    <span style="color: white;background-color: green;">{{session()->get('success')}}</span>
                @else
                    <span style="color: white;background-color: red;">{{session()->get('error')}}</span>
                @endif
                {{--                ket thuc bao loi session--}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Số lượng người dùng <a href="#" style="color: red!important;"> {{$user_number}}</a></h3>

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
                                <th>Tên</th>
                                <th>Sản Phẩm</th>
                                <th>Email</th>
                                <th>Show Comment</th>
                                <th>Quyền</th>
                                <th>Sửa</th>
                                <th>Xóa</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td><a href="{{route('backend.user.showProduct',$user->id)}}">Show</a></td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{route('backend.user.showComment',$user->id)}}">Show</a></td>
                                @if($user->role==2)
                                    <td>User</td>
                                @elseif($user->role==1)
                                    <td>Admin</td>
                                @endif
                                <td>
                                    <a href="{{route('backend.user.edit',$user->id)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('backend.user.destroy',$user->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i> Xoá
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- /.row (main row) -->
    </div>
    {{ $users->links() }}
@endsection

