@extends('adminlte::page')

@section('title', 'Tạo người dùng')

@section('content_header')
    <h1>Tạo người dùng</h1>(Mặc định sẽ là user thông thường, chờ được cấp các quyền hạn)
@stop

@section('content')
    <form action="{{route('admin.nguoi-dung.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên</label>
                <div class="input-group">
                <input type="text"class="form-control"  name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <div class="input-group">
                <input type="text"class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <div class="input-group">
                    <input type="password"class="form-control" placeholder="Nhập mật khẩu mới" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
