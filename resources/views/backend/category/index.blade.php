{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')

@stop

@section('content')
@if (count($parentCategory) > 0)
<div class="row">
    <div class="col-md-12">
        <div style="text-align: right">
            <label>Kéo thả để thay đổi vị trí</label>
        </div>
        <ul class="sort_menu list-group">
            @foreach ($parentCategory as $item)
              <li class="item__handle dropdown" data-id="{{ $item->id }}">
                    <span class="handle">
                        @if (count($item->category) >0)
                        <div class="dropdown-toggle"data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ $item->label }}
                        </div>
                        @else
                            <div>
                                {{ $item->label }}
                            </div>
                        @endif
                        <div class="dropdown-menu">
                            @foreach ($item->category as $items)
                            <div class="item__dropdown">
                                {{$items->category}}
                            </div>
                            @endforeach
                        </div>
                    </span>
                <form style="display: inline-block" action="{{route('admin.danh-muc-cha.show',$item->id)}}" id="search_form{{$item->id}}" method="post">
                    @csrf
                    @method('put')
                        <input type="text" hidden id="label{{$item->id}}" name="showindex" value="{{($item->showindex == 1) ? '0' : '1'}}" onchange="this.form.submit()"
                        >
                        <button type="submit"  for="label{{$item->id}}" id="check_box_id{{$item->id}}" class="btn btn-light">
                            @if ($item->showindex == 1)
                            <i class="fas fa-eye"></i>
                            @elseif($item->showindex == 0)
                            <i class="fas fa-eye-slash"></i>
                            @endif
                        </button>
                    </form>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#parentCat{{$item->id}}"><i class="fas fa-tools"></i></button>
                <!-- Modal -->
                    <div class="modal fade" id="parentCat{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="{{route('admin.danh-muc-cha.edit',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-form">
                                        <input type="text" class="form-control" name="label" value="{{ $item->label }}">
                                        <input type="text" class="form-control" name="text" value="{{$item->text}}">
                                        <button type="submit" class="btn btn-warning">Xác nhận</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <form action="{{route('admin.danh-muc-cha.destroy',$item->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
              </li>
            @endforeach
          </ul>
    </div>
</div>
@else
<div>
    Chưa tạo <b>danh mục cha</b>
</div>

@endif

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="border-right:1px solid white">Quản lý chức năng các danh mục con</th>
      </tr>
    </thead>
    @foreach ($parentCategory as $parent)
    <tbody>
        <tr>
            <td>Danh mục cha: <b style="text-transform: uppercase;color:red">{{$parent->label}}</b></td>
        </tr>
        <ul>
        @foreach ($parent->category()->get() as $item)
            <tr>
                <td>
                    <table class="table" style="text-align: center">
                        <thead>
                            @if ($loop->first)
                                <tr>
                                    <th style="width: 20%;font-size: .8em;">Tên danh mục</th>
                                    <th style="width: 10%;font-size: .8em;">Loại danh mục</th>
                                    <th style="width: 10%;font-size: .8em;text-align: left;">Sửa/ Xóa</th>
                                    <th style="width: 10%;font-size: .8em;">Show menu</th>
                                    <th style="width: 10%;font-size: .8em;">Show trang chủ</th>
                                    {{-- <th scope="col">Mới ra mắt</th> --}}
                                    <th style="width: 10%;font-size: .8em;">Sub footer</th>
                                    <th style="width: 10%;font-size: .8em;">Footer</th>
                                </tr>
                            @endif
                        </thead>
                        <tbody>
                          <tr>
                            <td style="width: 20%;font-size: .8em;">

                                    <li style="list-style-type: none">
                                        <b >{{$item->category}}</b>
                                    </li>
                                    {{--
                                        @if (count($item->childCategories) > 0)
                                        <ul>
                                        @foreach ($item->childCategories as $subCategories)
                                            @include('backend.category.child',['sub_categories' => $subCategories])
                                        @endforeach
                                    </ul>
                                    @endif
                                    --}}

                            </td>
                            <td style="width: 10%;font-size: .8em;">
                                @if ($item->type == 1)
                                    Sản phẩm
                                @else
                                    Bài viết
                                @endif
                            </td>
                            <td style="width: 10%;font-size: .8em;text-align: left;">
                                <span class="input-group-append">
                                    <a href="{{route('admin.danh-muc.edit',$item->id)}}" type="button" class="btn btn-success" >
                                        <i class="fas fa-tools"></i>
                                    </a>
                                    <form action="{{route('admin.danh-muc.destroy',$item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </span>
                            </td>
                            <td style="width: 10%;font-size: .8em;">
                                <form action="{{route('admin.danh-muc.show',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="showmenu" value="{{($item->showmenu == 1) ? '0' : '1'}}" hidden>
                                    <button type="submit" class="btn btn-dark">
                                        @if ($item->showmenu == 1)
                                        <i class="fas fa-eye"></i>
                                        @elseif($item->showmenu == 0)
                                        <i class="fas fa-eye-slash"></i>
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td style="width: 10%;font-size: .8em;">

                                    <form action="{{route('admin.danh-muc.show',$item->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="showindex" value="{{($item->showindex == 1) ? '0' : '1'}}" hidden>
                                        <button type="submit" class="btn btn-dark">
                                            @if ($item->showindex == 1)
                                            <i class="fas fa-eye"></i>
                                            @elseif($item->showindex == 0)
                                            <i class="fas fa-eye-slash"></i>
                                            @endif
                                        </button>
                                    </form>

                            </td>
                            {{-- <td>
                                @if ($item->type == 1)
                                <form action="{{route('admin.danh-muc.show',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="checkmenutop" value="{{($item->checkmenutop == 1) ? '0' : '1'}}" hidden>
                                <button type="submit" class="btn btn-dark">
                                    @if ($item->checkmenutop == 1)
                                    <i class="fas fa-eye"></i>
                                    @elseif($item->checkmenutop == 0)
                                    <i class="fas fa-eye-slash"></i>
                                    @endif
                                </button>
                                </form>
                                @endif
                            </td> --}}

                            <td style="width: 10%;font-size: .8em;">
                                <form action="{{route('admin.danh-muc.show',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="submenu" value="{{($item->submenu == 1) ? '0' : '1'}}" hidden>
                                <button type="submit" class="btn btn-dark">
                                    @if ($item->submenu == 1)
                                    <i class="fas fa-eye"></i>
                                    @elseif($item->submenu == 0)
                                    <i class="fas fa-eye-slash"></i>
                                    @endif
                                </button>
                                </form>
                            </td>
                            <td style="width: 10%;font-size: .8em;">
                                <form action="{{route('admin.danh-muc.show',$item->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="submenu2" value="{{($item->submenu2 == 1) ? '0' : '1'}}" hidden>
                                <button type="submit" class="btn btn-dark">
                                    @if ($item->submenu2 == 1)
                                    <i class="fas fa-eye"></i>
                                    @elseif($item->submenu2 == 0)
                                    <i class="fas fa-eye-slash"></i>
                                    @endif
                                </button>
                                </form>
                            </td>
                          </tr>
                        </tbody>

                      </table>

                </td>
            </tr>
            @endforeach
    </tbody>
    @endforeach
</ul>
  </table>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script>
  $(document).ready(function(){

    function updateToDatabase(idString){
       $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});

       $.ajax({
            url:'{{route('admin.danh-muc-cha.update')}}',
            method:'POST',
            data:{ids:idString},
            success:function(){
               alert('Successfully updated')
                //do whatever after success
            }
         })
    }

      var target = $('.sort_menu');
      target.sortable({
          handle: '.handle',
          placeholder: 'highlight',
          axis: "y",
          update: function (e, ui){
             var sortData = target.sortable('toArray',{ attribute: 'data-id'})
             updateToDatabase(sortData.join(','))
          }
      })

  })
</script>
@stop
