{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Banner trang chủ')

@section('content_header')
    <h1>Mạng xã hội trang chủ</h1>
@stop

@section('content')
<div class="card-body">
      <form action="{{route('admin.social.store')}}" method="POST">
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
            <label for="exampleInputEmail1">Nhập icon</label>
            <div class="input-group">
                <input type="text"class="form-control" placeholder="Nhập icon fontawesome" name="social">
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
                        <th scope="col">Icon mạng xã hội</th>
                        <th scope="col">Sửa/Xoá</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($social as $index => $item)
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
                            {!!$item->social!!}
                          </div>
                      </td>
                      <td>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#social{{$item->id}}">
                                <i class="fas fa-tools"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="social{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('admin.social.update',$item->id)}}" method="post">
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
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nhập icon</label>
                                                <div class="input-group">
                                                <input type="text"class="form-control" placeholder="Nhập icon fontawesome" value="{{$item->social}}" name="social">
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
                            <form action="{{route('admin.social.destroy',$item->id)}}" method="POST">
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
                  {{$social->links()}}
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
@stop
