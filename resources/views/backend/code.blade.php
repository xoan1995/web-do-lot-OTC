{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Code bổ sung')

@section('content_header')
    <h1>Code bổ sung</h1>
@stop

@section('content')

      <form action="{{route('admin.code.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name">
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">code đầu thẻ header</label>
              <textarea class="form-control" id="exampleInputEmail1" name="header" placeholder="<header>"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Code sau thẻ body</label>
              <textarea class="form-control" id="exampleInputPassword1" name="body" placeholder="<body>"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Code chân trang</label>
                <textarea  class="form-control" id="exampleInputPassword1" name="footer" placeholder="<footer>"></textarea>
              </div>
        <button type="submit" class="btn btn-primary">Tạo mới</button>
      </form>
    </div>
        <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên code</th>
                    <th scope="col">Sửa/Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($code as $index=>$item)
                    <tr>
                      <th scope="row">{{$index++}}</th>
                      <td>{{$item->name}}</td>
                      <td>
                      <form action="{{route('admin.code.destroy',$item->id)}}" method="POST">
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
                      <td>
                        #
                      </td>
                    </tr>
                  @endforelse

                </tbody>
                <tfoot>
                  {{$code->links()}}
                </tfoot>
              </table>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
