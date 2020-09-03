{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Banner trang chủ')

@section('content_header')
    <h1>Banner trang chủ</h1>
@stop

@section('content')
<div class="card-body">
      <form action="{{route('admin.banner.update',$banner->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên</label>
                        <div class="input-group">
                        <input type="text"class="form-control" placeholder="Nhập số thứ tự" value="{{$banner->name}}" name="name">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Loại hiển thị</label>
                        <select name="type" class="form-control">
                        <option value="1" {{($banner->type == 1) ? 'selected' : ''}}>Hiển thị tất cả</option>
                            <option value="2" {{($banner->type == 2) ? 'selected' : ''}}>Chỉ hiển thị banner, không có nội dung</option>
                            <option value="3" {{($banner->type == 3) ? 'selected' : ''}}>Hiển thị nội dung, không hiển thị banner</option>
                          </select>
                      </div>
                </div>
            </div>


              <div class="form-group">
                <label>Nội dung</label>
              <textarea class="summernote" name="text">{{$banner->text}}</textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nhập đường dẫn tĩnh</label>
                <div class="input-group">
                    <input type="text"class="form-control" placeholder="Nhập link" value="{{$banner->link}}" name="link">
                </div>
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nhập thứ tự</label>
                <div class="input-group">
                    <input type="number"class="form-control" placeholder="Nhập số thứ tự" value="{{$banner->sort_by}}" name="sort_by">
                </div>
              </div>
            <label for="exampleInputEmail1">Nhập banner</label>
            <div class="input-group">
                <span class="input-group-btn">
                  <a id="banner" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </span>
            <input id="thumbnail" class="form-control" type="text" value="{{$banner->banner}}" name="banner">
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script>
  var getName =   document.getElementById("get_name").value;
  document.getElementById("to_link").innerHTML = getName;
</script>
<script>
    $('#banner').filemanager('image');
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
