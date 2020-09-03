@extends('frontend.app')
@section('title')
    Danh sách
@endsection
@section('content')

</div>
</section>
<section class="container" style="margin-top:5%">
    <div class="row">
        <div class="col-md-12">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
            <ul class="nav " id="pills-tab" role="tablist">
                <li class="cart__tab cart__tab__item">
                    <a class="cart__item active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Still in your wish-list</a>
                </li>
                <li class="cart__tab cart__tab__item">
                    <a class="cart__item" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">waiting order</a>
                </li>
            </ul>
            <div class="tab-content" style="width: 90%;margin: auto;padding-top: 2%;" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @if (Cart::count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    NAME
                                </th>
                                <TH scope="col">
                                    COLOR
                                </TH>
                                <th scope="col">
                                    PRICE
                                </th>
                                <th scope="col">
                                    QUANTITY
                                </th>
                                <th scope="col">
                                    DELETE
                                </th>
                                <th scope="col">
                                    TOTAL
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td>
                                    <span class="cart__img">
                                        <span class="cart__img__img">
                                            <img style="width: 50px" src="{{$product->Find($item->id)->avatar}}">
                                        </span>
                                        <span class="cart__name">
                                            {{$item->name}}
                                        </span>
                                    </span>
                                </td>
                                {{-- {{dd($item->options->color)}} --}}
                                <form action="{{route('cart.update',$item->rowId)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                <td>
                                    @foreach ($product->Find($item->id)->Color()->get() as $color)
                                        <input type="radio" hidden value="{{$color->color}}" class="radiohot{{$item->id}}{{$color->id}}" name="color" id="hot{{$item->id}}{{$color->id}}"
                                            {{($item->options->color == $color->color) ? 'checked' : ''}}
                                        >
                                        <label class="check__boxhot custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="hot{{$item->id}}{{$color->id}}">
                                            <div style="background-color: {{$color->color}};"></div>
                                        </label>
                                        <style>
                                            .radiohot{{$item->id}}{{$color->id}}:checked+.check__boxhot{
                                                border-bottom: 2px solid black;
                                            }
                                        </style>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="cart__table__item">
                                        {{$item->price}}
                                    </div>

                                </td>
                                <td>
                                    <div class="cart__table__item cart__quantity">
                                        <input type="text" name="qty" value="{{$item->qty}}">
                                    </div>
                                    <button type="submit">
                                        <i class="fas fa-sync"></i>
                                    </button>
                                </td>
                                </form>
                                <td class="cart__table__item">
                                    <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                        @csrf @method('POST')
                                        <button type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="cart__table__item">
                                    {{($item->price)*($item->qty)}} <i class="fas fa-euro-sign"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total: {{Cart::instance('default')->count()}}</td>
                            <td></td>
                            <td>
                                {{Cart::instance('default')->subtotal(0)}} <i class="fas fa-euro-sign"></i>
                            </td>
                        </tfoot>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="cart__button__right">
                                <form action="{{route('cart.saveforlater',$item->rowId)}}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <i class="fas fa-check"></i> GO TO CART !
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else YOUR WISH-LIST STILL BLANK ! @endif
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @if (Cart::instance('saveForLater')->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            NAME
                                        </th>
                                        <th scope="col">
                                            COLOR
                                        </th>
                                        <th scope="col">
                                            PRICE
                                        </th>
                                        <th scope="col">
                                            QUANTITY
                                        </th>
                                        <th scope="col">
                                            TOTAL
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::instance('saveForLater')->content() as $item)

                                    <tr>
                                        <td>
                                            <span class="cart__img">
                                                <span class="cart__img__img">
                                                    <img style="width: 50px" src="{{$item->model->avatar}}">
                                                </span>
                                                <div class="cart__name">
                                                    {{$item->model->name}}
                                                </div>
                                            </span>
                                        </td>
                                        <td>
                                            <label class="check__boxhot custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m">
                                                <div style="background-color: {{($item->options->color)}};"></div>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="cart__table__item cart__name">
                                                {{$item->model->price2}}
                                            </div>

                                        </td>
                                        <td>
                                            <div class="cart__table__item cart__quantity">
                                                    <input type="text" value="{{$item->qty}}" disabled>
                                            </div>
                                                <form style="display: inline-block" action="{{route('movetocart',$item->rowId)}}" method="POST">
                                                    @csrf
                                                    <button>
                                                        <i class="fas fa-tools"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="cart__table__item">
                                            <span class="cart__name">
                                                {{($item->qty)*($item->model->price2)}} <i class="fas fa-euro-sign"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        {{-- <td colspan="2">
                                            <div class="cart__voncher">
                                                <form action="{{route('checkout.check')}}" method="get">
                                                    @csrf
                                                    @method('get')
                                                    <div class="cart__voncher">
                                                        <input name="voncher" class="cart__voncher__input" placeholder="Voncher" value="" type="text">
                                                        <button type="submit" class="cart__voncher__btn" type="submit">
                                                            Kiểm tra !
                                                        </button>
                                                    </div>
                                                </form>
                                                @if (session()->has('check'))
                                                    <div class="alert alert-success">
                                                        {{session()->get('check')}}
                                                    </div>
                                                @elseif(session()->has('error'))
                                                    <div class="alert alert-danger">
                                                        {{session()->get('error')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </td> --}}
                                        <td>TAX:{{Cart::setTax($item->rowId,0)}}</td>
                                        <td></td>
                                        <td>
                                        </td>
                                        <td>
                                            Quantity total: {{Cart::instance('saveForLater')->count()}}
                                        </td>
                                        <td class="cart__table__item">
                                            <div class="cart__total__price">
                                                <span class="cart__name">
                                                    <input type="text" name="total" value="{{Cart::instance('saveForLater')->total(0)}}" disabled> <i class="fas fa-euro-sign" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="index__product__header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="index__product__header__header">
                                            Order role
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{route('checkout')}}" method="POST">
                                @csrf
                                @method('POST')
                                <table class="table">
                                    <thead>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input name="cart_role" type="radio" id="cart_role1" value="0" checked>
                                                    <label for="cart_role1">Direct payment</label>
                                                </th>
                                                <th>
                                                    <input name="cart_role" type="radio" id="cart_role2" value="1">
                                                    <label for="cart_role2">Paying through bank</label>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if(session()->has('code'))
                                                    <div class="cart__voncher">
                                                        <input name="code" placeholder="Voncher" type="hidden" value="{{session()->get('code')}}">
                                                    </div>
                                                    @endif
                                                    @if (session()->has('value'))
                                                        <input type="hidden" name="value" value="{{session()->get('value')}}">
                                                    @endif
                                                    @if ($user)
                                                        <div class="pl-2 pr-2">
                                                            <input type="text" name="user_id" hidden value="{{$user->id}}">
                                                            <div class="cart__input">
                                                                <input type="text" name="username" value="{{$user->name}}">
                                                            </div>
                                                            <div class="cart__input">
                                                                <input type="text" name="useremail" value="{{$user->email}}">
                                                            </div>
                                                            <div class="cart__input">
                                                                <input type="text" name="usercall" placeholder="Call number*" required>
                                                            </div>
                                                            <div class="cart__input">
                                                                <input type="text" name="address" placeholder="Address*">
                                                            </div>
                                                            <div class="cart__input">
                                                                <textarea name="text" placeholder="Take notes here"></textarea>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="pl-2 pr-2">
                                                            <input type="text" name="user_id" hidden value="">
                                                            <div class="cart__input">
                                                                <input type="text" name="username" placeholder="Name*">
                                                            </div>
                                                            <div class="cart__input">
                                                                <input type="email" name="useremail" placeholder="E-mail*">
                                                            </div>
                                                            <div class="cart__input">
                                                                <input type="text" name="usercall" placeholder="Call number*">
                                                            </div>
                                                            <div class="cart__input">
                                                                <input type="text" name="address" placeholder="Address*">
                                                            </div>
                                                            <div class="cart__input">
                                                                <textarea name="text" placeholder="Take notes here"></textarea>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="cart__button__right">
                                            <button type="submit">
                                                <i class="fas fa-check"></i> CONFIRM ORDER
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                        You have not finished the <b>PRODUCT</b> selection process @endif
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
