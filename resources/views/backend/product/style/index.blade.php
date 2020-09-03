
@extends('adminlte::page')

@section('title', 'Thuộc tính sản phẩm')

@section('content_header')
    <h1>Thuộc tính sản phẩm</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <form action="{{route('admin.tuy-chinh.color')}}" method="POST" class="form-group">
            @csrf
            @method('POST')
              <label>Chọn màu </label>
              <div class="input-group my-colorpicker2">
                <input type="text" name="color" class="form-control" required>

                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-square"></i></span>
                  <button type="submit" class="btn btn-primary">Lưu mã màu</button>
                </div>
              </div>
              <!-- /.input group -->

            </form>
          </div>
          <div class="col-md-6">
          <form action="{{route('admin.tuy-chinh.size')}}" method="POST" class="form-group">
            @csrf
            @method('POST')
                <label>Kích thước</label>
                <div class="input-group">
                  <input type="text" name="size" class="form-control" placeholder="kích thước loại 1" required>
                  <input type="text" name="size2" class="form-control" placeholder="kích thước loại 2">
                  <input type="text" name="sizefix" class="form-control" placeholder="Co giãn">
                  <div class="input-group-prepend">
                      <button type="submit" class="btn btn-primary">Lưu kích thước</button>
                  </div>
                </div>
              </form>
          </div>
    </div>
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col" style="width: 50%">Màu sắc</th>
                <th scope="col">Kích cỡ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="row">
                    @forelse ($color as $item)
                    <div class="col-4 mb-3">
                      <div class="input-group">
                      <form class="input-group-prepend" method="POST" action="{{route('admin.tuy-chinh.colorDestroy',$item->id)}}">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <!-- /btn-group -->
                        <input type="text" class="form-control" disabled value="{{$item->color}}">
                        <div class="input-group-prepend">
                          <div style="background-color: {{$item->color}};" class="color__style"></div>
                        </div>
                      </div>
                    </div>
                    @empty
                        Chưa có nhận bảng màu
                    @endforelse
                  </div>
                </td>
                <td>
                  <div class="row">
                    @forelse ($size as $item)
                    <div class="col-4 mb-3">
                      <div class="input-group">
                      <form class="input-group-prepend" method="POST" action="{{route('admin.tuy-chinh.sizeDestroy',$item->id)}}">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <!-- /btn-group -->
                      <input type="text" class="form-control" disabled value="{{$item->size}} - {{$item->size2}} - {{$item->sizefix}}">
                      </div>
                    </div>
                    @empty
                        Chưa có nhận bảng màu
                    @endforelse
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script type="text/javascript" src="{{asset('js/admin_custom.js')}}"></script>
@stop
