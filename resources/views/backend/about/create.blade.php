{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tạo bài viết')

@section('content_header')
    <h1>Tạo bài viết</h1>
@stop

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tạo bài viết</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
    <form role="form" action="{{route('admin.bai-viet.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label>Vị trí danh mục</label>
                <select name="category" class="custom-select">
                    @foreach ($categories as $category)
                            @if (count($category->category->where('type',2)) > 0)
                                <optgroup  label="+++{{$category->label}}+++"></optgroup>
                            @endif
                            @foreach ($category->category->where('type',2) as $item)
                                    <option value="{{$item->id}}">---{{$item->category}}---</option>
                            @endforeach
                    @endforeach
                </select>
              </div>
              <div class="form-check">
                <input type="checkbox" name="showindex" class="form-check-input"  value="1">
                <label class="form-check-label" for="exampleCheck1" >Hiện trang chủ</label>
              </div>
              <div class="form-group">
                <label >Hiện trang chủ</label>
                <select class="custom-select" name="role">
                    <optgroup label="Chọn hình thức hiển thị"></optgroup>
                    <option value="1" selected>
                        Hiện tên hình ảnh tóm tắt
                    </option>
                    <option value="2">
                        Chỉ hiện nội dung ( video/ media/ Facebook plugin)
                    </option>
                </select>
              </div>
          <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" name="name" class="form-control" >
          </div>
          <div class="form-group">
            <label >Tóm tắt</label>
            <textarea type="text" name="text" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Hình đại diện</label>
            <div class="input-group">
                <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="image">
              </div>
              <img id="holder" style="margin-top:15px;max-height:100px;">
          </div>
          <div class="form-group">
            <label>Nội dung</label>
            <textarea class="summernote" name="editor"></textarea>
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
<script>
 $(document).ready(function(){

// Define function to open filemanager window
var lfm = function(options, cb) {
 var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
 window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
 window.SetUrl = cb;
};

// Define LFM summernote button
var LFMButton = function(context) {
 var ui = $.summernote.ui;
 var button = ui.button({
   contents: '<i class="note-icon-picture"></i> ',
   tooltip: 'Insert image with filemanager',
   click: function() {

     lfm({type: 'image', prefix: '/filemanager'}, function(lfmItems, path) {
       lfmItems.forEach(function (lfmItem) {
         context.invoke('insertImage', lfmItem.url);
       });
     });

   }
 });
 return button.render();
};

     // Initialize summernote with LFM button in the popover button group
     // Please note that you can add this button to any other button group you'd like
     $('.summernote').summernote({
       toolbar: [
           ['popovers', ['lfm']],
           ['style', ['style']],
           ['font', ['bold', 'italic', 'underline', 'clear']],
           ['fontsize', ['fontsize']],
           ['fontname', ['fontname']],
           ['color', ['color']],
           ['para', ['ul', 'ol', 'paragraph']],
           ['height', ['height']],
           ['table', ['table']],
           ['insert', ['link', 'hr']],
           ['view', ['fullscreen', 'codeview']],
       ],
       fontSizes: ['12', '14', '16', '18', '24', '36', '48', '60', '72', '96'],
       buttons: {
         lfm: LFMButton
       }
     })
   });
 </script>
@stop
