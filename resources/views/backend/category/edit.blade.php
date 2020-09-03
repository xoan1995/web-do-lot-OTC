
@extends('adminlte::page')

@section('title', 'Danh mục')

@section('content_header')

@stop

@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quản lý danh mục</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
    <form role="form" action="{{route('admin.danh-muc.update',$data->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-8">
            <div class="card-body">
              <div class="row no-gutters">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Tên menu con</label>
                      <input type="text" name="category" value="{{$data->category}}" placeholder="Tên menu con" class="form-control" id="exampleInputEmail1">
                      </div>
                  </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Chú thích</label>
                  <input type="text" name="text" value="{{$data->text}}" class="form-control" placeholder="Chú thích danh mục">
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
                          <input id="thumbnail2" class="form-control" value="{{$data->image}}" type="text" name="image">
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
                    <option value="{{$parent->id}}"
                      @foreach ($parent->category()->get() as $item)
                          {{($item->id == $data->id) ? 'selected' : ''}}
                        @endforeach
                      >{{$parent->label}}</option>
                    @endforeach
                  </select>
                  <div class="form-group">
                    <label>Vị trí danh mục con</label>
                    <select class="form-control select2" name="category_id" style="width: 100%;">
                      <option value="" selected="selected"
                      {{($data->category_id == 0) ? 'selected' : ''}}
                      >Đứng sau menu cha</option>
                      @foreach ($category as $item)
                        <option value="{{$item->id}}"
                          {{($data->category_id == $item->id) ? 'selected' : ''}}
                          >
                          Đứng sau : -- {{$item->category}}
                        </option>
                      @endforeach
                    </select> 
                  </div>
                  <div class="form-group">
                    <label>Loại menu</label>
                    <select class="form-control select2" name="type" style="width: 100%;">
                      <option value="1" {{($data->type == 1) ? 'selected' : ''}}>Sản phẩm</option>
                      <option value="2" {{($data->type == 2) ? 'selected' : ''}}>Bài viết</option>
                    </select>
                  </div>
                    <label>Vị trí hiển thị</label>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox0" value="1" name="showmenu"
                      {{($data->showmenu == 1) ? 'checked' : ''}}
                      >
                      <label for="customCheckbox0" class="custom-control-label">Show lên thanh menu</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="1"  name="checkindex"
                      {{($data->checkindex == 1) ? 'checked' : ''}}
                      >
                      <label for="customCheckbox1" class="custom-control-label">Theo phong cách</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" value="1"  id="customCheckbox2" name="checkmenutop"
                      {{($data->checkmenutop == 1) ? 'checked' : ''}}
                      >
                      <label for="customCheckbox2" class="custom-control-label">Mới ra mắt</label>
                    </div>
                    {{-- <div class="custom-control custom-checkbox ml-4">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox3" name="submenu">
                      <label for="customCheckbox3" class="custom-control-label">Show submenu gần footer</label>
                    </div> --}}
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" value="1"  id="customCheckbox4" name="submenu2"
                      {{($data->submenu2 == 1) ? 'checked' : ''}}
                      >
                      <label for="customCheckbox4" class="custom-control-label">Show danh sách gần footer</label>
                    </div>
              </div>
            </div>
          </div>
        </div>
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
