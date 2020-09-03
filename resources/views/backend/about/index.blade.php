{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Danh sách bài đăng')

@section('content_header')
    <h1>Danh sách bài viết</h1>

<select name="category" class="custom-select" onchange="location = this.value;">
    <option disabled value="" selected>Chọn danh mục bài viết</option>
    @foreach ($categories->where('type',2) as $category)
            <option value="{{route('admin.bai-viet.index',['category'=>Str::slug($category->slug)])}}">{{$category->category}}</option>
    @endforeach
</select>
@stop
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">
            URL
        </th>
        <th scope="col">Sửa/Xóa</th>

      </tr>
    </thead>
    <tbody>
        @forelse ($gioithieu as $index =>$item)
        <tr>
            <th scope="row">{{$index++}}</th>
            <td><img style="width: 50px" src="{{$item->image}}"></td>
            <td>{{$item->name}}</td>
            <td style="width:34%;">
                @foreach ($item->category as $category)
                    {{env('APP_URL')}}/{{$category->slug}}/chi-tiet/{{$item->slug}}
                @endforeach
            </td>
            <td>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a href="{{route('admin.bai-viet.edit',$item->id)}}"  class="btn btn-warning"><i class="fas fa-wrench"></i></a>
                    </div>
                    <div class="input-group-prepend">
                        <form action="{{route('admin.bai-viet.destroy',$item->id)}}" method="post">
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
  {{$gioithieu->links()}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
