
@extends('adminlte::page')

@section('title', 'Danh mục')

@section('content_header')

@stop

@section('content')

<div class="form-group">
    <label>Tạo menu cha</label>
<form action="{{route('admin.danh-muc-cha.store')}}" method="post">
    @csrf
    @method('POST')
        <div class="form-group">
          <label>Tên menu cha</label>
            <input type="text" class="form-control" placeholder="Tên menu" name="label">

        </div>
        <div class="form-group">
          <label>Tóm tắt</label>
          <input type="text" class="form-control" placeholder="Tóm tắt" name="text">
        </div>
        <div >
          <button type="submit" class="btn btn-primary">Lưu</button>
      </div>
    </form>
</div>
<label style="margin-top:2%">Tạo menu con</label>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
    <form role="form" action="{{route('admin.danh-muc.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
          <div class="col-md-8">
            <div class="card-body">
              <div class="row no-gutters">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Tên menu con</label>
                          <input type="text" name="category" placeholder="Tên menu con" class="form-control" id="exampleInputEmail1">
                      </div>
                  </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Chú thích</label>
                    <input type="text" name="text" class="form-control" placeholder="Chú thích danh mục">
                  </div>
                </div>
              </div>
            <div class="form-group">
              <label>Hình ảnh</label>
              <div class="input-group">
                          <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                              <i class="fa fa-picture-o"></i> Choose
                            </a>
                          </span>
                          <input id="thumbnail2" class="form-control" value="" type="text" name="image">
                      </div>
            </div>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <div class="form-group">
                  <label>Chọn menu cha</label>
                  <select class="form-control select2" name="parentId" style="width: 100%;">
                    @foreach ($parentCategory as $parent)
                      <option value="{{$parent->id}}" selected="selected">{{$parent->label}}</option>
                    @endforeach
                  </select>
                  <div class="form-group">
                    <label>Vị trí danh mục con</label>
                    <select class="form-control select2" name="category_id" style="width: 100%;">
                      <option value="" selected="selected">Đứng sau danh mục con</option>
                      @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->category}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Loại menu</label>
                    <select class="form-control select2" name="type" style="width: 100%;">
                      <option value="1" selected="selected">Sản phẩm</option>
                      <option value="2" selected="selected">Bài viết</option>
                    </select>
                  </div>
                    <label>Vị trí hiển thị</label>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox0" value="1" name="showmenu">
                      <label for="customCheckbox0" class="custom-control-label">Show lên thanh menu</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="1" name="checkindex">
                      <label for="customCheckbox1" class="custom-control-label">Theo phong cách</label>
                    </div>
                    {{-- <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="1" name="checkmenutop">
                      <label for="customCheckbox2" class="custom-control-label">Mới ra mắt</label>
                    </div> --}}
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox3" value="1" name="submenu">
                      <label for="customCheckbox3" class="custom-control-label">Show submenu gần footer</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox4" value="1" name="submenu2">
                      <label for="customCheckbox4" class="custom-control-label">Show danh sách ở footer</label>
                    </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script>
        $('#lfm').filemanager('image');
    </script>
@stop
