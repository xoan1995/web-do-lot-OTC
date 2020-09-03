
@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    Bảng thống kê user
@stop

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Email</th>
        <th scope="col">Quyền hạn</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Sửa/Xóa</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($user as $index =>$item)
            <tr>
                <th scope="row">{{$index++}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{implode(', ',$item->roles()->get()->pluck('name')->toArray())}}</td>
                <td>Tạo lúc : {{date('d-m-Y', strtotime($item->created_at))}}<br>Cập nhật lần cuối:{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                <td>
                    @can('manage-users')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#banner{{$item->id}}">
                            <i class="fas fa-tools"></i>
                        </button>

                    <!-- Modal -->
                    <div class="modal fade" id="banner{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{route('admin.nguoi-dung.update',$item->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên</label>
                                        <div class="input-group">
                                        <input type="text"class="form-control"  value="{{$item->name}}" name="name">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <div class="input-group">
                                        <input type="text"class="form-control"value="{{$item->email}}" name="email">
                                        </div>
                                      </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <div class="input-group">
                                            <input type="password"class="form-control" placeholder="Nhập mật khẩu mới" name="password">
                                        </div>
                                    </div>
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <input type="radio" id="user{{$role->id}}" name="roles" value="{{ $role->id}}"
                                            @if ($item->roles->pluck('id')->contains($role->id))
                                                checked
                                            @endif>
                                        <label for="user{{$role->id}}">{{$role->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>

                        </div>
                        </div>
                    </div>
                        <form action="{{route('admin.nguoi-dung.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    @endcan
              </td>
            </tr>
        @endforeach

    </tbody>
  </table>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
