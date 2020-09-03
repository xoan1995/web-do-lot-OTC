{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tạo sản phẩm')

@section('content_header')

@stop

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tạo sản phẩm</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Chọn ảnh</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{route('admin.thu-vien.gallery')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file[]" multiple>
                        <label class="custom-file-label" for="exampleInputFile">Tải hình lên</label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" class="input-group-text btn btn-success" id="">Xác nhận</button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
        </div>
        </div>
    </div>
    <form role="form" action="{{route('admin.san-pham.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
              <div class="form-group">
                <label>Chọn danh mục</label>
                <select class="select2" multiple="multiple" name="category[]" style="width: 100%;" required>
                    @foreach ($categories as $category)
                        @if (count($category->category->where('type',1))>0)
                            <optgroup  label="+++{{$category->label}}+++"></optgroup>
                        @endif
                        @foreach ($category->category->where('type',1) as $item)
                            <option value="{{$item->id}}">---{{$item->category}}---</option>
                        @endforeach
                    @endforeach
                </select>

              </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Chọn ảnh đại diện</label>
                <div class="input-group">
                    <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                      </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="avatar">
                  </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Chú thích tính năng sản phẩm</label>
                <input type="text" name="nametext" class="form-control" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail2">Chú thích 2 tính năng sản phẩm</label>
                <input type="text" name="nametext2" class="form-control" id="exampleInputEmail2">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label >Giá cũ (nếu để trống sẽ không xuất hiện)</label>
                <input type="text" name="price1" class="form-control" >
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label >Giá đưa ra (nếu để trống là liên hệ)</label>
                  <input type="text" name="price2" class="form-control" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Chọn màu </label>
                  <div class="product__style__box">
                    @foreach ($color as $item)
                  <input class="product__style__box__checkbox--box" type="checkbox" value="{{$item->id}}" hidden id="color{{$item->color}}" name="color[]">
                    <label class="product__style__box__checkbox--label ml-1 mr-1 mb-1 mt-1" style="background-color: {{$item->color}}" for="color{{$item->color}}">
                      <i class="far fa-check-circle"></i>
                    </label>
                    @endforeach

                  </div>
                  <!-- /.input group -->
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Chọn kích cỡ </label>
                  <div class="product__style__box">
                    @foreach ($size as $item)
                    <input class="product__style__box__checkbox--box" type="checkbox" value="{{$item->id}}" hidden id="size{{$item->size}}" name="size[]">
                    <label class="product__style__box__checkbox--label ml-1 mr-1 mb-1 mt-1" for="size{{$item->size}}">
                      <span>{{$item->size}}</span>
                    </label>
                    @endforeach

                  </div>
                  <!-- /.input group -->
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-check">
                    <input id="productnew" name="productnew" class="form-check-input" value="1" type="checkbox">
                    <label for="productnew" class="form-check-label">Sản phẩm sale</label>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-check">
                    <input id="producthot" name="producthot" class="form-check-input" value="1" type="checkbox">
                    <label for="producthot" class="form-check-label">Sản phẩm hot</label>
                  </div>
              </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Tóm tắt</label>
            <textarea class="summernote" name="option"></textarea>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Album sản phẩm</label>
                <div class="input-group">
                  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
                      Tải ảnh lên
                  </button>
                  <div style="color: red;font-size:12px;MARGIN-LEFT:10px; height:30px;line-height:30px">
                    (chú ý: Thêm ảnh vào thư viện trước khi tải album cho sản phẩm)
                  </div>
                </div>
                <div class="product__style__box">
                @forelse ($gallery as $item)
                    <div class="gallery__component">
                            <input class="id_image gallery__checkbox" hidden name="gallery[]" type="checkbox" value="{{$item->id}}" id="gallery{{$item->id}}">
                            <label class="gallery__img" for="gallery{{$item->id}}">
                                <img src="{{url(('/storage/gallery/').$item->img)}}">
                            </label>
                    </div>
                @empty
                    Trống
                @endforelse
                </div>
              </div>
            </div>
            @if (count($logo) > 0)
            <div class="col-md-6">
                <div class="form-group">
                  <label>Nhãn hiệu</label>
                    <div class="product__style__box">
                      @forelse ($logo as $item)
                          <div class="gallery__component">
                            <input class="id_image gallery__checkbox" hidden name="logo" type="radio" value="{{$item->slug}}" id="gallery{{$item->slug}}" {{$loop->first ? 'checked' : ''}}>
                            <label class="gallery__img" for="gallery{{$item->slug}}">
                                <img src="{{$item->logo}}">
                            </label>
                          </div>
                      @empty
                          Trống
                      @endforelse
                      </div>
                </div>
              </div>
            @endif
            @if (count($type) > 0)
            <div class="col-md-6">
                <div class="form-group">
                  <label>Kiểu dáng</label>
                    <div class="product__style__box">
                      @forelse ($type as $item)
                          <div class="gallery__component">
                            <input class="id_image gallery__checkbox" name="type" hidden type="radio" value="{{$item->id}}" id="type{{$item->id}}" {{$loop->first ? 'checked' : ''}}>
                            <label class="gallery__img" for="type{{$item->id}}">
                                <img src="{{$item->img}}">
                            </label>
                          </div>
                      @empty
                          Trống
                      @endforelse
                      </div>
                </div>
              </div>
            @endif
          </div>
          <div class="form-group">
              <label>Đặc điểm</label>
            <textarea class="summernote" name="info1"></textarea>
          </div>
          <div class="form-group">
            <label>Thông số kĩ thuật</label>
          <textarea class="summernote" name="info2"></textarea>
        </div>
        <div class="form-group">
            <label>Kích cỡ</label>
          <textarea class="summernote" name="info3"></textarea>
        </div>
        <div class="form-group">
          <label>Lưu ý</label>
        <textarea class="summernote" name="info4"></textarea>
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
<script type="text/javascript" src="{{asset('js/admin_custom.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  </script>
@stop
