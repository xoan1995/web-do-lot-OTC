{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Danh sách bài đăng')

@section('content_header')
    <h1>Danh sách sản phẩm</h1>

<select name="category" class="custom-select" onchange="location = this.value;">
    <option disabled value="" selected>Chọn danh mục sản phẩm</option>
    @foreach ($categories as $category)
        @if ($category->type == 1)
            <option value="{{route('admin.san-pham.index',['category'=>Str::slug($category->slug)])}}">{{$category->category}}</option>
        @endif
    @endforeach
</select>
@stop

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">
            URL
        </th>
        <th scope="col">Sale</th>
        <th scope="col">Hot</th>
        <th scope="col">Sửa / Xóa</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($sanpham as $index =>$item)
        <tr>
            <th scope="row">{{$index++}}</th>
            <td><img style="width: 50px" src="{{$item->avatar}}"></td>
            <td>{{$item->name}}</td>
            <td>
                @foreach ($item->category as $productcategory)
                {{$productcategory->category}} <br>
                @endforeach
            </td>
            <td>
                <form style="display: inline-block" action="{{route('admin.san-pham.show',$item->id)}}" id="search_form{{$item->id}}" method="post">
                    @csrf
                    @method('put')
                        <input type="text" hidden id="label{{$item->id}}" name="productnew" value="{{($item->productnew == 1) ? '0' : '1'}}" onchange="this.form.submit()"
                        >
                        <button type="submit"  for="label{{$item->id}}" id="check_box_id{{$item->id}}" class="btn btn-info">
                            @if ($item->productnew == 1)
                            <i class="fas fa-file-alt"></i>
                            @elseif($item->productnew == 0)
                            <i class="fas fa-file"></i>
                            @endif
                        </button>
                    </form>

            </td>
            <td>
                <form style="display: inline-block" action="{{route('admin.san-pham.show',$item->id)}}" id="search_form{{$item->id}}" method="post">
                    @csrf
                    @method('put')
                        <input type="text" hidden id="label{{$item->id}}" name="producthot" value="{{($item->producthot == 1) ? '0' : '1'}}" onchange="this.form.submit()"
                        >
                        <button type="submit"  for="label{{$item->id}}" id="check_box_id{{$item->id}}" class="btn btn-secondary">
                            @if ($item->producthot == 1)
                            <i class="fas fa-calendar-check"></i>
                            @elseif($item->producthot == 0)
                            <i class="far fa-calendar-times"></i>
                            @endif
                        </button>
                    </form>
            </td>
            <td>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a href="{{route('admin.san-pham.edit',$item->id)}}"  class="btn btn-warning"><i class="fas fa-wrench"></i></a>
                    </div>
                    <div class="input-group-prepend">
                        <form action="{{route('admin.san-pham.destroy',$item->id)}}" method="post">
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
  @if ($sanpham == null || count($sanpham) == 0)

  @else

  {{$sanpham->links()}}
  @endif

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
