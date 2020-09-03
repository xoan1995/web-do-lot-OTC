{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Giao diện')

@section('content_header')

@stop

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Cập nhật giao diện chung</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
    <form role="form" action="{{route('admin.giao-dien.update',1)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>favicon</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                            <a id="lfm1" data-input="thumbnail1" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                            </span>
                            <input id="thumbnail1" class="form-control" value="{{$themes->favicon}}" type="text" name="favicon">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <img id="holder" src="{{$themes->favicon}}" style="margin-top:15px;max-width:100%;max-height:100px;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Logo</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="thumbnail2" class="form-control" value="{{$themes->logo}}" type="text" name="logo">
                      </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <img id="holder" src="{{$themes->logo}}" style="margin-top:15px;width:100%;max-height:100px;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Title trang chủ</label>
                        <input type="text" name="title" value="{{$themes->title}}" class="form-control">
                      </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Đường dây nóng</label>
                  <input type="text" name="hotline" value="{{$themes->hotline}}" class="form-control">
                </div>
              </div>
            </div>
          <div class="form-group">
            <label>Tiêu đề subfooter</label>
             <input class="form-control" name="slogan" value="{{$themes->slogan}}">
            <textarea class="summernote" name="subfooter">{{$themes->subfooter}}</textarea>
          </div>
        </div>
        </div>


        <!-- /.card-body -->
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
    <style>
        .form-group label{
            margin-left: 10px;
        }
    </style>
@stop

@section('js')
<script>
    $('#lfm1').filemanager('image');
    $('#lfm2').filemanager('image');
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
       lineHeights: ['0.2','0.4','0.6','0.8','1.0','1.2','1.4','1.5','1.6','1.8','2.0','3.0'],
       buttons: {
         lfm: LFMButton
       }
     })
   });
 </script>
@stop
