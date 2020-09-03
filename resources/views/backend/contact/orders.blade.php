
@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    <h1>Khách hàng liên hệ</h1>
@stop

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Họ tên</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Thời gian gửi</th>
        <th scope="col">Phân loại</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($orders as $index =>$item)
        <tr>
            <th scope="row">{{$index += 1}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->call}}</td>
            <td>{{date('d M Y - H:i:s',strtotime($item->created_at))}}</td>
            <td>
                @if (($users->where('id',$item->user_id)->first()) == null)
                Khách vãng lai
                @else
                    @if (($users->where('id',$item->user_id)->first()->roles->first()->name) == 'admin')
                        Tài khoản admin
                    @else
                        @if ((($users->where('id',$item->user_id)->first()->roles)->first()->name) == 'seller')
                            Đại lý cấp 1
                        @else
                            @if (($users->where('id',$item->user_id)->first()->roles->first()->name) == 'seller2')
                                Đại lý cấp 2
                            @endif
                        @endif
                    @endif
                @endif
            </td>
            <td>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <button  class="btn btn-warning" data-toggle="modal" data-target="#contact{{$item->id}}"><i class="far fa-eye"></i></button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="contact{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Tên đầy đủ</label>
                                <input type="text" class="form-control" value="{{$item->name}}" disabled>
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{$item->email}}" disabled>
                              </div>
                              <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" value="{{$item->call}}" disabled>
                              </div>
                              <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea type="text" class="form-control" disabled>{{$item->address}}</textarea>
                              </div>
                              <div class="form-group">
                                <label>Chi tiết sản phẩm</label>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                Hình ảnh
                                            </th>
                                            <th scope="col">
                                                Màu sắc
                                            </th>
                                            <th scope="col">
                                                Tên
                                            </th>
                                            <th scope="col">
                                                Số lượng
                                            </th>
                                            <th scope="col">
                                                Tổng tiền
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts->where('checkout_id',$item->id) as $cart)
                                        <tr>
                                            <td>
                                                <img class="d-block" style="width: 50px" src="{{$product->Find($cart->product_id)->avatar}}">

                                            </td>
                                            <td>
                                                <div class="color__block" style="background-color:{{$cart->color}}"></div>
                                            </td>
                                            <td>
                                                {{$cart->product_name}}
                                            </td>
                                            <td>
                                                {{$cart->quantity}}
                                            </td>
                                            <td>
                                                @if (($users->Find($item->user_id)) )
                                                    <span style="text-decoration: line-through">{{($cart->price)}}</span>
                                                    <span><b style="color: red">{{($cart->quantity)*(($cart->price) - ($users->Find($item->user_id)->priceSale->first()->pricesale))}} $</b></span>
                                                @else
                                                <span>{{($cart->quantity)*($cart->price)}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <label>Tổng tiền</label>
                                                    {{$item->total}} $
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                              </div>
                              <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea type="text" class="form-control" disabled>{{$item->text}}</textarea>
                              </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="input-group-prepend">
                        <form action="{{route('admin.lien-he.destroy',$item->id)}}" method="post">
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
                    Không có phản hồi
                </td>
            </tr>
        </tbody>
        @endforelse

    </tbody>
  </table>
  {{$orders->links()}}
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
