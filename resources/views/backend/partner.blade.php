{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Partner trang chủ')

@section('content_header')
    <h1>Đối tác trang chủ</h1>
@stop

@section('content')
<div class="card-body">
      <form action="{{route('admin.partner.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên</label>
                <div class="input-group">
                    <input type="text"class="form-control" placeholder="Nhập số thứ tự" name="name">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nhập đường dẫn tĩnh</label>
                <div class="input-group">
                    <input type="text"class="form-control" placeholder="Nhập link" name="link">
                </div>
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nhập thứ tự</label>
                <div class="input-group">
                    <input type="number"class="form-control" placeholder="Nhập số thứ tự" value="1" name="sort_by">
                </div>
              </div>
            <label for="exampleInputEmail1">Nhập logo đối tác</label>
            <div class="input-group">
                <span class="input-group-btn">
                  <a id="banner" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="partner">
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
</div>
        <table class="table">
                <thead class="thead-dark">
                  <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Tên</th>
                      <th scope="col">Link</th>
                        <th scope="col">Logo đối tác</th>
                        <th scope="col">Sửa/Xoá</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($partner as $index => $item)
                    <tr>
                        <th>
                            {{$item->sort_by}}
                        </th>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->link}}
                        </td>
                      <td style="width:30%">
                          <div class="banner--img">
                            <img src="{{$item->partner}}" alt="banner{{$index++}}">
                          </div>
                      </td>
                      <td>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#banner{{$item->id}}">
                                <i class="fas fa-tools"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="banner{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('admin.partner.update',$item->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên</label>
                                                <div class="input-group">
                                                <input type="text"class="form-control" placeholder="Nhập số thứ tự" value="{{$item->name}}" name="name">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Nhập đường dẫn tĩnh</label>
                                                <div class="input-group">
                                                <input type="text"class="form-control" placeholder="Nhập số thứ tự" value="{{$item->link}}" name="link">
                                                </div>
                                              </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nhập thứ tự</label>
                                                <div class="input-group">
                                                    <input type="number"class="form-control" value="{{$item->sort_by}}" placeholder="Nhập số thứ tự" name="sort_by">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </form>

                                </div>
                                </div>
                            </div>
                            <form action="{{route('admin.partner.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                      </td>

                    </tr>
                  @empty
                    <tr>
                      <th scope="row">#</th>
                      <td>Trống</td>
                    </tr>
                  @endforelse

                </tbody>
                <tfoot>
                  {{$partner->links()}}
                </tfoot>
              </table>
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
    document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('button-image').addEventListener('click', (event) => {
    event.preventDefault();

    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });
    });

    // set file link
    function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
    }

</script>
@stop
