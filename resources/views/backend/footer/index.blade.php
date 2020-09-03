@extends('adminlte::page')

@section('title', 'Chân trang')

@section('content_header')

@stop

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Sửa/Xóa</th>

      </tr>
    </thead>
    <tbody>
        @forelse ($footer as $index =>$item)
        <tr>
            <th scope="row">{{$index++}}</th>
            <td>{{$item->header}}</td>
            <td>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a href="{{route('admin.footer.edit',$item->id)}}"  class="btn btn-warning"><i class="fas fa-wrench"></i></a>
                    </div>
                    <div class="input-group-prepend">
                        <form action="{{route('admin.footer.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                  </div>
            </td>
          </tr>
        @empty
        <tbody>
            <tr>
                <td colspan="4" style="text-align: center">
                    Không có bài viết
                </td>
            </tr>
        </tbody>
        @endforelse

    </tbody>
  </table>
  {{$footer->links()}}
@endsection
