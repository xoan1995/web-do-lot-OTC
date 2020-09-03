
@extends('adminlte::page')

@section('title', 'Kiểu dáng')

@section('content_header')
    <h1>Kiểu dáng</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('admin.kieu-dang.store')}}" method="POST" class="form-group">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-6">
                <label>Chọn icon</label>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="img">
                      </div>
                </div>
            </div>
            <div class="col-md-6">
                <label>Chú thích</label>
                <input type="text" name="name" class="form-control" placeholder="Chú thích kiểu dáng của sản phẩm">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên</th>
            <th scope="col">Xóa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($type as $index => $item)
                <tr>
                    <th scope="row">{{$index+=1}}</th>
                    <td>
                        <img style="width: 50px;height:50px" src="{{$item->img}}">
                    </td>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>
                        <form action="{{route('admin.kieu-dang.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script type="text/javascript" src="{{asset('js/admin_custom.js')}}"></script>
@stop
