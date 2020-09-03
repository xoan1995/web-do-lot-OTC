
@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    <h1>Khách hàng liên hệ</h1>
@stop

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ tên</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Thời gian gửi</th>
        <th scope="col">Phân loại</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($contact as $index =>$item)
        <tr>
            <th scope="row">{{$index += 1}}</th>
            <td>{{$item->username}}</td>
            <td>{{$item->usercall}}</td>
            <td>{{date('d M Y - H:i:s',strtotime($item->created_at))}}</td>
            <td>
                @if (($users->where('id',$item->user_id)->first()) == null)
                    Khách vãng lai
                @else
                    @if (($users->where('id',$item->user_id)->first()->roles->first()->name) == 'admin')
                        Tài khoản admin
                    @else
                        @if ((dd($users->where('id',$item->user_id)->first()->roles)->first()->name) == 'seller')
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
                                    <label >Họ tên</label>
                                    <input type="text" value="{{$item->username}}" class="form-control" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{$item->useremail}}" class="form-control" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" value="{{$item->usercall}}" class="form-control" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$item->address}}" class="form-control" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Sản phẩm</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <label>Ảnh</label>
                                            <img class="d-block w-100" src="{{$product->Find($item->product_id)->avatar}}">
                                        </div>
                                        <div class="col-2">
                                            <label>Tên</label>
                                            <span class="d-block">{{$product->Find($item->product_id)->name}}</span>
                                        </div>
                                        <div class="col-3">
                                            <label>Giá cả</label>
                                            <div class="d-block">
                                                @if (($product->Find($item->product_id)->PriceSale()->first()->pricesale))
                                                    <span style="text-decoration: line-through">{{($item->price)}}</span>
                                                    <span><b style="color: red">{{($item->price) - ($users->Find($item->user_id)->priceSale->first()->pricesale)}} $</b></span>
                                                @else
                                                <span>{{($item->price)}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <label>Màu sắc</label>
                                            <div style="width: 50px;height:50px;background-color:{{$item->color}}"></div>
                                        </div>
                                        <div class="col-3">
                                            <label>Số lượng</label>
                                            <span class="d-block">{{$item->quantity}}</span>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea rows="3" class="form-control" disabled>{{$item->text}}</textarea>
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
  {{$contact->links()}}
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
