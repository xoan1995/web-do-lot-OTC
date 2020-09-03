
@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tải ảnh lên</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Thư viện</a>
        </li>
    </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="{{route('admin.thu-vien.gallery.destroy')}}" method="POST">
                @csrf
                @method('POST')
            <div class="input-group">
                    <input type="hidden" class="form-control id_image_check" placeholder="Hình gallery">
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text btn btn-danger" style="border: 1px solid red"><i class="fas fa-times"></i></button>
                        <span class="input-group-text">Xoá</span>
                    </div>

            </div>
            @forelse ($gallery as $item)
                <div class="gallery__component">
                    <input class="id_image gallery__checkbox" type="checkbox" name="productcarousel[]" value="{{$item->id}}" id="gallery{{$item->id}}">
                        <label class="gallery__img" for="gallery{{$item->id}}">
                            <img src="{{env('APP_URL').('/storage/gallery/').$item->img}}">
                        </label>
                </div>
            @empty
                Trống
            @endforelse
        </form>
        </div>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@stop
