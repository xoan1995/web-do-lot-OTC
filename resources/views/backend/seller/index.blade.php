@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    <h1>Thống kê sản phẩm chiết khấu</h1>
@stop

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">{{$userauth->name}} -- Quyền hạn: {{$userauth->roles->first()->name}}</h3>
    </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="width:10%">Tên người dùng</th>
            <th scope="col" style="width:15%">Chức vụ</th>
            <th scope="col">Mức giảm giá</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($userauth->roles->first()->name == 'admin' && count($user->priceSale) > 0)
                    <tr>
                        <td style="width:10%">{{$user->name}}</td>
                        <td style="width:15%">
                            <div class="input-group">
                                @if ($userauth->roles->first()->name == 'seller')
                                    <input type="text" value=" Đại lý cấp 1" disabled class="form-control">
                                @endif
                                @if ($userauth->roles->first()->name == 'seller2')
                                    <input type="text" value=" Đại lý cấp 2" disabled class="form-control">
                                @endif
                            </div>

                        </td>
                        <td>
                            <ul>
                                @foreach ($user->priceSale as $pricesale)
                                    <li class="mb-3">
                                        <!-- Modal -->
                                        <div class="modal fade" id="pricesale{{$pricesale->id}}" tabindex="-1" role="dialog" aria-labelledby="pricesale{{$pricesale->id}}ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="pricesale{{$pricesale->id}}ModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                Bạn có muốn xóa mức giảm giá <b>{{ $pricesale->pricesale}}</b> không?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{route('admin.seller.productSale.destroy',$pricesale->id)}}" class="input-group-prepend" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <form action="{{route('admin.seller.updatesaleprice.update',$pricesale->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                            <div class="input-group">
                                                @if (($userauth->roles->first()->name) == 'admin')
                                                    <div class="input-group-prepend">
                                                        <button type="submit" class="btn btn-warning"><i class="fas fa-tools"></i></button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#pricesale{{$pricesale->id}}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>

                                                <!-- /btn-group -->
                                                    <input type="text" value="{{ $pricesale->pricesale}}" name="pricesale" class="form-control">
                                                @else
                                                    <input type="text" disabled value="{{ $pricesale->pricesale}}" name="pricesale" class="form-control">
                                                @endif
                                            </div>

                                            <div class="product__style__box">
                                                @foreach ($pricesale->product as $item)
                                                <div class="gallery__component m-1">
                                                    <input class="id_image gallery__checkbox" hidden name="product[]" type="checkbox" value="{{$item->id}}" id="gallery{{$item->id}}"
                                                        @foreach ($product as $productId)
                                                            {{($productId->id == $item->id) ? 'checked' : ''}}
                                                        @endforeach
                                                    >
                                                    <label class="gallery__img" for="gallery{{$item->id}}">
                                                        <img src="{{$item->avatar}}">
                                                    </label>
                                                    <div class="gallery__component__price">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <span>{{$item->name}}</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="gallery__component__price--old">
                                                                    {{$item->price2 }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="gallery__component__price--sale">
                                                                    {{$item->price2 - $pricesale->pricesale}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif
            @endforeach

        </tbody>
      </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script src="{{asset('js/admin_custom.js')}}"> console.log('Hi!'); </script>
@stop
