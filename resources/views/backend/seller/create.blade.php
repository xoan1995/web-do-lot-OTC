
@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    <h1>Tạo chiết khấu cho người dùng hiện tại</h1>
@stop

@section('content')
<form method="POST" action="{{route('admin.seller.store')}}" class="card card-default">
    @csrf
    @method('POST')
    <div class="card-header">
        <h3 class="card-title">{{$userauth->name}} -- Quyền hạn: {{$userauth->roles->first()->name}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label>Chọn đại lý áp dụng phương thức giảm giá</label>
            <select class="duallistbox" multiple="multiple" name="user[]" required>
                @foreach ($users as $user)
                    @if ($userauth->roles->first()->name == 'admin')
                        @if ($user->roles->first()->name == 'seller' || $user->roles->first()->name == 'seller2')
                            <option value="{{$user->id}}">{{$user->name}} -- Quyền hạn: {{$user->roles->first()->name}}</option>
                        @endif
                    @endif
                    @if ($userauth->roles->first()->name == 'seller')
                        @if ($user->roles->first()->name == 'seller2')
                            <option value="{{$user->id}}">{{$user->name}} -- Quyền hạn: {{$user->roles->first()->name}}</option>
                        @endif
                    @endif
                @endforeach
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-6">
            <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                  <input type="radio" id="radioPrimary1" value="0" name="type" checked>
                  <label for="radioPrimary1">
                      Áp dụng toàn bộ cho sản phẩm
                  </label>
                </div>

              </div>
        </div>
        <div class="col-md-6">
            <div class="inputsale--type1">
                <input type="text" class="form-control" name="saletype1">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary2" value="1" name="type">
                    <label for="radioPrimary2">
                        Áp dụng cho 1 số sản phẩm
                    </label>
                  </div>
            </div>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="saletype2">
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Chọn Sản phẩm áp dụng giảm giá </label>
                <div class="product__style__box">
                  @foreach ($product as $item)
                    <div class="gallery__component">
                        <input class="id_image gallery__checkbox" hidden name="product[]" type="checkbox" value="{{$item->id}}" id="gallery{{$item->id}}">
                        <label class="gallery__img" for="gallery{{$item->id}}">
                            <img src="{{$item->avatar}}">
                        </label>
                        <div class="gallery__component__price">
                            {{$item->name}}
                        </div>
                    </div>
                  @endforeach

                </div>
                <!-- /.input group -->
              </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-success">Lưu</button>
    </div>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script src="{{asset('js/admin_custom.js')}}"> console.log('Hi!'); </script>
@stop
