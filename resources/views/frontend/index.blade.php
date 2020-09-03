@extends('frontend.app')
@section('title')
{{ $themes->title }}
@endsection
@section('content')
<!-- phần banner quảng cáo -->

<main>
        @if(count($banner->where('type',2)) > 0)
        @foreach($banner->where('type',2) as $item)
            <section class="main__dau__tien">
                <div class="container">
                    <a href="{{ $item->link }}" class="main__dau__tien__img">
                        <img src="{{ $item->banner }}" alt="">
                    </a>
                    <!-- bỏ qua phần main thứ hai carousel sản phẩm -->
                </div>
            </section>
        @endforeach
    @endif
    @if(count($banner->where('type',3)) > 0)
        @foreach($banner->where('type',3) as $item)
            <section class="banner">
                <div class="container">
                    <div class="banner__quang__cao">
                        <a href="{{ $item->link }}">
                            {!!$item->text!!}
                        </a>
                    </div>
                </div>
            </section>
        @endforeach
    @endif
    @if (count($product->where('producthot',1)) > 0)
    <section class="container ">
        <div class="custom__carousel__and__multiple__targets">
            <div class="index__producthot--slick">
                @foreach ($product->where('producthot',1) as $productItem)
                    <div >
                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua">
                            @foreach ($productItem->Category()->get()->take(1) as $category)
                                <a href="{{$category->slug.'/chi-tiet/'.$productItem->slug}}" class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh">
                                    <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__1">
                                        <img  src="{{$productItem->avatar}}">
                                    </div>

                                    @if ($productItem->gallery()->first())
                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__hover">
                                            <img  src="{{url(('/storage/gallery/').$productItem->gallery()->first()->img)}}">
                                        </div>
                                    @else
                                    <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__hover"></div>
                                    @endif
                                    @if (($productItem->price1 - $productItem->price2) > 0)
                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__giam__gia__sp">Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</div>
                                    @endif

                                    <form action="{{route('cart.store')}}" method="post" class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__them__yt">
                                        @csrf
                                        @method('POST')
                                        <input type="text" value="{{$productItem->id}}" hidden name="id">
                                        <input type="text" value="{{$productItem->name}}" hidden name="name">
                                        <input type="text" value="{{$productItem->price2}}" hidden name="price2">
                                        <input class="quantity" name="quantity" value="1" hidden type="number">
                                        <input type="text" value="#18171B" hidden name="color">
                                        <button type="submit" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__btn__2">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </form>
                                </a>
                            @endforeach
                            <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp">
                                <div class="productshow__price">
                                    @if ($productItem->price1 != null)
                                    <span class="productshow__price--price1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                    @endif
                                    <span class="productshow__price--price2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                </div>
                                <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp__ten__sp">
                                    <span>{{$productItem->name}}</span>
                                </div>
                                <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp__th__sp">
                                    <span>{{$productItem->nametext1}}</span>
                                </div>
                                <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp__th__sp">
                                    <span>{{$productItem->nametext2}}</span>
                                </div>
                                <div class="product__data__toggle">
                                    <button data-toggle="collapse" data-target="#{{$productItem->slug}}{{$productItem->id}}-1" aria-expanded="flase" aria-controls="{{$productItem->slug}}{{$productItem->id}}-1">
                                        Infomation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="custom-accordion" id="accordion-1">
                @foreach ($product->where('producthot',1) as $productItem)
                    <div class="card custom__carousel__card__thong__tin__san__pham">
                        <div id="{{$productItem->slug}}{{$productItem->id}}-1" class="collapse" aria-labelledby="{{$productItem->slug}}{{$productItem->id}}-1" data-parent="#accordion-1">
                            <div class="card-body">
                                <div class="custom__carousel__card__thong__tin__san__pham__tieu__de"><span>QUICK VIEW</span></div>

                                <div class="row">
                                    <!-- carousel trong thông tin sản phẩm -->

                                    <div id="carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" class="carousel slide col-12 col-sm-12 col-md-2 mb-2" data-ride="carousel">
                                        <ol class="carousel-indicators custom__carousel__card__thong__tin__san__pham__carousel__indicators">
                                            <li data-target="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" data-slide-to="0" class="active"></li>
                                            @foreach ($productItem->gallery as $index => $gallery)
                                                <li data-target="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" data-slide-to="{{$index+=1}}"></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner custom__carousel__card__thong__tin__san__pham__carousel__inner">
                                            <div class="carousel-item custom__carousel__card__thong__tin__san__pham__carousel__item active">
                                                <img class="d-block w-100" src="{{$productItem->avatar}}">
                                                @if (($productItem->price1 - $productItem->price2) > 0)
                                                    <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__giam__gia__sp">Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</div>
                                                @endif
                                            </div>
                                            @foreach ($productItem->gallery as $gallery)
                                                <div class="carousel-item custom__carousel__card__thong__tin__san__pham__carousel__item">
                                                    <img class="d-block w-100" src="{{url(('/storage/gallery/').$gallery->img)}}">
                                                    @if (($productItem->price1 - $productItem->price2) > 0)
                                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__giam__gia__sp">Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev custom__carousel__card__thong__tin__san__pham__carousel__control__prev" href="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        </a>
                                        <a class="carousel-control-next custom__carousel__card__thong__tin__san__pham__carousel__control__next" href="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        </a>
                                    </div>

                                    <!-- end -->

                                    <!-- tiêu đề và thông tin sản phẩm -->

                                    <div class="col-12 col-sm-12 col-md-4 mb-2">

                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__td">
                                            <span>{{$productItem->name}}</span>
                                        </div>

                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__tt">
                                            <span>{!!$productItem->nametext!!}</span>
                                        </div>
                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__tt">
                                            <span>{{$productItem->nametext2}}</span>
                                        </div>
                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__gia">
                                            <div class="productshow__price">
                                                @if ($productItem->price1 != null)
                                                    <span class="productshow__price--price1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                @endif
                                                <span class="productshow__price--price2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                            </div>
                                            <div>{!!$productItem->option!!}</div>
                                        </div>

                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__nd">
                                            {!!$productItem->info1!!}
                                        </div>

                                    </div>

                                    <!-- end -->

                                    <div class="col-12 col-sm-12 col-md-6 mb-2">
                                        <form name="myproductnew{{$productItem->id}}" action="{{route('cart.addtocart')}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="row no-gutters">
                                                <div class="col-3">
                                                    <span>Color</span>
                                                </div>

                                                <div class="col-9">
                                                    <div class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km">
                                                        @foreach ($productItem->Color()->get() as $color)
                                                            <input type="radio" hidden value="{{$color->color}}" class="radiohot{{$productItem->slug}}{{$color->id}}" name="color" id="hot{{$productItem->slug}}{{$color->id}}">
                                                            <label class="check__boxhot custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="hot{{$productItem->slug}}{{$color->id}}">
                                                                <div style="background-color: {{$color->color}};"></div>
                                                            </label>
                                                            <style>
                                                                .radiohot{{$productItem->slug}}{{$color->id}}:checked+.check__boxhot{
                                                                    border-bottom: 2px solid black;
                                                                }
                                                            </style>
                                                        @endforeach

                                                        <!-- màu 1 -->
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="row no-gutters mt-3">
                                                    <div class="col-3">
                                                        <span>Size</span>
                                                    </div>
                                                    <div class="col-5">
                                                        <select  onchange="getCombonew{{$productItem->id}}(this)" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__kc__boc__1__label">
                                                            <option disabled selected>
                                                                Choose
                                                            </option>
                                                            @foreach ($productItem->Size()->get() as $size)
                                                                <option>
                                                                    {{$size->size}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="row no-gutters mt-3">
                                                <div class="col-3">
                                                    <span>Quatity</span>
                                                </div>
                                                <div class="col-5">
                                                    <input class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__kc__boc__1__label" name="soluong" value="1" type="number">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <button type="button" class="productshow--btn" data-toggle="modal" data-target="#productnew{{$productItem->slug}}{{$productItem->id}}" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__btn__1">
                                                        Buy now <i class="fas fa-shopping-bag"></i>
                                                    </button>
                                                    <div class="modal fade" id="productnew{{$productItem->slug}}{{$productItem->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$productItem->slug}}Label" aria-hidden="true" >
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title productshow__modal--title" id="{{$productItem->slug}}Label">THIS ITEM HAS BEEN ADDED TO YOUR BASKET</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <div class="productshow__modal--img">
                                                                            <img src="{{$productItem->avatar}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <div class="productshow__modal--name">
                                                                            <span>{{$productItem->name}}</span>
                                                                        </div>
                                                                        @if ($productItem->type->first())
                                                                            <div class="productshow__modal--type">
                                                                                <span>{{$productItem->type->first()->name}}</span>
                                                                            </div>
                                                                        @endif
                                                                        <div class="productshow__modal--category">
                                                                            <span>{{$category->category}}</span>
                                                                        </div>
                                                                        <div class="productshow__modal--price">
                                                                            @if ($productItem->price1 != null)
                                                                                <span class="productshow__modal--price__1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                                            @endif
                                                                            <span class="productshow__modal--price__2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                                                            <span class="productshow__modal--price__user"></span>
                                                                        </div>
                                                                        <div class="productshow__modal--color">
                                                                            <label class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$productItem->id}}">
                                                                                @if (count($productItem->Color()->get()) == 1)
                                                                                    <div style="background-color: {{$productItem->Color()->first()->color}}"></div>
                                                                                @else
                                                                                    <div id="printcolornew{{$productItem->id}}"></div>
                                                                                @endif
                                                                            </label>
                                                                        </div>
                                                                        <div class="productshow__modal--color">
                                                                             Size: <span id="printSizenew{{$productItem->id}}"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="col-5">
                                                                    <div class="productshow__modal__btn--close">
                                                                        <button type="button" data-dismiss="modal">Continue shopping</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2"></div>
                                                                <div class="col-5">
                                                                        <input type="text" value="{{$productItem->id}}" hidden name="productId">
                                                                        <input type="text" value="{{$productItem->name}}" hidden name="name">
                                                                        <input type="text" value="{{$productItem->price2}}" hidden name="price2">
                                                                        <div class="productshow__modal__btn--submit">
                                                                            <button type="submit">Order now !</button>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="productshow__modal--carousel">
                                                                    <div class="productshow__modal--carousel__header">
                                                                        RELATED PRODUCTS OF THE SERIES
                                                                    </div>
                                                                    <div class="productshow__modal--carousel__slider">
                                                                        @foreach ($categories as $category)
                                                                            @foreach ($category->product as $item)
                                                                                <div>
                                                                                    <a href="{{url($category->slug.'/chi-tiet/'.$item->slug)}}" class="productshow__modal--carousel__slider--component">
                                                                                        <div class="productshow__modal--carousel__slider--img">
                                                                                            <img src="{{$item->avatar}}">
                                                                                        </div>
                                                                                        <div class="productshow__modal--carousel__slider--price">
                                                                                            @if ($productItem->price1 != null)
                                                                                                <span class="productshow__modal--price__1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                                                            @endif
                                                                                            <span class="productshow__modal--price__2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                                                                        </div>
                                                                                        <div class="productshow__modal--carousel__slider--category">
                                                                                            {{$category->category}}
                                                                                        </div>
                                                                                        <div class="productshow__modal--carousel__slider--name">
                                                                                            {{$item->name}}
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                            var myColor = document.myproductnew{{$productItem->id}}.color;
                                            var prev = null;
                                            for (var i = 0; i < myColor.length; i++) {
                                                myColor[i].addEventListener('change', function() {
                                                    (prev) ? console.log(prev.value): null;
                                                    if (this !== prev) {
                                                        prev = this;
                                                    }
                                                    var x = this.value;
                                                    document.getElementById('printcolornew{{$productItem->id}}').style.backgroundColor = x;
                                                });
                                            }
                                            function getCombonew{{$productItem->id}}(selectObject) {
                                                var value = selectObject.value;
                                                document.getElementById('printSizenew{{$productItem->id}}').innerHTML = value;
                                                console.log(value);
                                            }
                                        </script>
                                    </div>

                                    <!-- end -->
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    @endif

    @if(count($banner->where('type',1)) > 0)
        @foreach($banner->where('type',1) as $item)
            <section class="main__dau__tien">
                <div class="container">
                    <!-- main đầu tiên banner sản phẩm -->
                    <div>
                        {!!$item->text!!}
                    </div>
                    <div class="main__dau__tien__img">
                        <img src="{{ $item->banner }}" alt="">
                        <a href="{{ $item->link }}">More !</a>

                    </div>
                    <!-- bỏ qua phần main thứ hai carousel sản phẩm -->
                </div>
            </section>
        @endforeach
    @endif

    @if (count($product->where('productnew',1)) > 0)
        <section class="container ">
            <div class="custom__carousel__and__multiple__targets">
                <div class="main__thu__ba__tieu__de__1">
                    <span>Discounted products</span>
                </div>
                <div class="main__thu__ba__tieu__de__2">
                    <span>Product groups are on sale!</span>
                </div>

                <div class="index__productnew--slick">
                    <!-- ảnh 1 -->
                    @foreach ($product->where('productnew',1) as $productItem)
                        <div >
                            <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua">
                                @foreach ($productItem->Category()->get()->take(1) as $category)
                                    <a href="{{$category->slug.'/chi-tiet/'.$productItem->slug}}" class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh">
                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__1">
                                            <img  src="{{$productItem->avatar}}">
                                        </div>

                                        @if ($productItem->gallery()->first())
                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__hover">
                                            <img  src="{{url(('/storage/gallery/').$productItem->gallery()->first()->img)}}">
                                        </div>
                                        @else
                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__hover"></div>
                                        @endif
                                        @if (($productItem->price1 - $productItem->price2) > 0)
                                            <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__giam__gia__sp">Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</div>
                                        @endif
                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__them__yt">
                                            <form action="{{route('cart.store')}}" method="post" class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh__them__yt">
                                                @csrf
                                                @method('POST')
                                                <input type="text" value="{{$productItem->id}}" hidden name="id">
                                                <input type="text" value="{{$productItem->name}}" hidden name="name">
                                                <input type="text" value="{{$productItem->price2}}" hidden name="price2">
                                                <input class="quantity" name="quantity" value="1" hidden type="number">
                                                <input type="text" value="#18171B" hidden name="color">
                                                <button type="submit" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__btn__2">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </a>
                                @endforeach

                                <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp">
                                    <div class="productshow__price">
                                        @if ($productItem->price1 != null)
                                            <span class="productshow__price--price1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                        @endif
                                        <span class="productshow__price--price2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                    </div>
                                    <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp__ten__sp">
                                        <span>{{$productItem->name}}</span>
                                    </div>
                                    <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp__th__sp">
                                        <span>{{$productItem->nametext1}}</span>
                                    </div>
                                    <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp__th__sp">
                                        <span>{{$productItem->nametext2}}</span>
                                    </div>
                                    <div class="product__data__toggle">
                                        <button data-toggle="collapse" data-target="#{{$productItem->slug}}{{$productItem->id}}-2" aria-expanded="true" aria-controls="{{$productItem->slug}}{{$productItem->id}}-2">
                                            Infomation
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="custom-accordion" id="accordion">
                    @foreach ($product->where('productnew',1) as $productItem)
                            <div class="card custom__carousel__card__thong__tin__san__pham">
                                <div id="{{$productItem->slug}}{{$productItem->id}}-2" class="collapse" aria-labelledby="{{$productItem->slug}}{{$productItem->id}}-2" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de"><span>QUICK VIEW</span></div>

                                        <div class="row">
                                            <!-- carousel trong thông tin sản phẩm -->

                                            <div id="carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" class="carousel slide col-2" data-ride="carousel">
                                                <ol class="carousel-indicators custom__carousel__card__thong__tin__san__pham__carousel__indicators">
                                                    <li data-target="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" data-slide-to="0" class="active"></li>
                                                    @foreach ($productItem->gallery as $index => $gallery)
                                                        <li data-target="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" data-slide-to="{{$index+=1}}"></li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner custom__carousel__card__thong__tin__san__pham__carousel__inner">
                                                    <div class="carousel-item custom__carousel__card__thong__tin__san__pham__carousel__item active">
                                                        <img class="d-block w-100" src="{{$productItem->avatar}}">
                                                        @if ($productItem->price1 != null)
                                                            <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__giam__gia__sp">Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</div>
                                                        @endif
                                                    </div>
                                                    @foreach ($productItem->gallery as $gallery)
                                                        <div class="carousel-item custom__carousel__card__thong__tin__san__pham__carousel__item">
                                                            <img class="d-block w-100" src="{{url(('/storage/gallery/').$gallery->img)}}">
                                                            @if ($productItem->price1 != null)
                                                                <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__giam__gia__sp">Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev custom__carousel__card__thong__tin__san__pham__carousel__control__prev" href="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                </a>
                                                <a class="carousel-control-next custom__carousel__card__thong__tin__san__pham__carousel__control__next" href="#carouselExampleIndicators-ttsp-custom-{{$productItem->id}}" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                </a>
                                            </div>

                                            <!-- end -->

                                            <!-- tiêu đề và thông tin sản phẩm -->

                                            <div class="col-4">

                                                <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__td">
                                                    <span>{{$productItem->name}}</span>
                                                </div>

                                                <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__tt">
                                                    <span>{!!$productItem->nametext!!}</span>
                                                </div>
                                                <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__tt">
                                                    <span>{!!$productItem->nametext2!!}</span>
                                                </div>
                                                <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__gia">
                                                    <div class="productshow__price">
                                                        @if ($productItem->price1 != null)
                                                            <span class="productshow__price--price1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                        @endif
                                                        <span class="productshow__price--price2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                                    </div>
                                                    <div>{!!$productItem->option!!}</div>
                                                </div>

                                                <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__nd">
                                                    {!!$productItem->info1!!}
                                                </div>

                                            </div>

                                            <!-- end -->

                                            <div class="col-6">
                                                <form name="myproducthot{{$productItem->id}}" action="{{route('cart.addtocart')}}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="row no-gutters">
                                                        <div class="col-3">
                                                            <span>Color</span>
                                                        </div>

                                                        <div class="col-9">
                                                            <div class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km">
                                                                @foreach ($productItem->Color()->get() as $color)

                                                                <input type="radio" value="{{$color->color}}" hidden class="radio{{$productItem->slug}}{{$color->id}}" name="color" id="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__mhot{{$productItem->slug}}{{$color->id}}">
                                                                    <label class="check__box custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__mhot{{$productItem->slug}}{{$color->id}}">
                                                                        <div style="background-color: {{$color->color}};"></div>
                                                                    </label>
                                                                    <style>
                                                                        .radio{{$productItem->slug}}{{$color->id}}:checked+.check__box{
                                                                            border-bottom: 2px solid black;
                                                                        }
                                                                    </style>
                                                                @endforeach

                                                                <!-- màu 1 -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="row no-gutters mt-3">
                                                            <div class="col-3">
                                                                <span>Size</span>
                                                            </div>
                                                            <div class="col-5">
                                                                <select  onchange="getCombohot{{$productItem->id}}(this)" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__kc__boc__1__label" for="check__box__chon__kich__co">
                                                                    <option disabled selected>
                                                                        Choose
                                                                    </option>
                                                                    @foreach ($productItem->Size()->get() as $size)
                                                                        <option>
                                                                            {{$size->size}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <div class="row no-gutters mt-3">
                                                        <div class="col-3">
                                                            <span>Quatity</span>
                                                        </div>
                                                        <div class="col-5">
                                                            <input class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__kc__boc__1__label" name="soluong" value="1" type="number">
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <button type="button" class="productshow--btn" data-toggle="modal" data-target="#producthot{{$productItem->slug}}{{$productItem->id}}" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__btn__1">
                                                                Buy now <i class="fas fa-shopping-bag"></i>
                                                            </button>
                                                            <div class="modal fade" id="producthot{{$productItem->slug}}{{$productItem->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$productItem->slug}}hotLabel" aria-hidden="true" >
                                                                <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title productshow__modal--title" id="{{$productItem->slug}}hotLabel">THIS ITEM HAS BEEN ADDED TO YOUR BASKET</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="productshow__modal--img">
                                                                                    <img src="{{$productItem->avatar}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-8">
                                                                                <div class="productshow__modal--name">
                                                                                    <span>{{$productItem->name}}</span>
                                                                                </div>
                                                                                @if ($productItem->type->first())
                                                                                    <div class="productshow__modal--type">
                                                                                        <span>{{$productItem->type->first()->name}}</span>
                                                                                    </div>
                                                                                @endif
                                                                                <div class="productshow__modal--category">
                                                                                    <span>{{$category->category}}</span>
                                                                                </div>
                                                                                <div class="productshow__modal--price">
                                                                                    @if ($productItem->price1 != null)
                                                                                        <span class="productshow__modal--price__1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                                                    @endif
                                                                                    <span class="productshow__modal--price__2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                                                                    <span class="productshow__modal--price__user"></span>
                                                                                </div>
                                                                                <div class="productshow__modal--color">
                                                                                    <label class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$productItem->id}}">
                                                                                        @if (count($productItem->Color()->get()) == 1)
                                                                                            <div style="background-color: {{$productItem->Color()->first()->color}}"></div>
                                                                                        @else
                                                                                            <div id="printcolorhot{{$productItem->id}}"></div>
                                                                                        @endif
                                                                                    </label>
                                                                                </div>
                                                                                <div class="productshow__modal--color">
                                                                                        Size: <span id="printSizehot{{$productItem->id}}"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="col-5">
                                                                            <div class="productshow__modal__btn--close">
                                                                                <button type="button" data-dismiss="modal">Continue shopping</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2"></div>
                                                                        <div class="col-5">
                                                                            <form action="{{route('cart.store')}}" method="post" class="productshow__indicator__container--heart">
                                                                                @csrf
                                                                                @method('POST')
                                                                                <input type="text" value="{{$productItem->id}}" hidden name="productId">
                                                                                <input type="text" value="{{$productItem->name}}" hidden name="name">
                                                                                <input type="text" value="{{$productItem->price2}}" hidden name="price2">
                                                                                <div class="productshow__modal__btn--submit">
                                                                                    <button type="submit">Order now !</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="productshow__modal--carousel">
                                                                            <div class="productshow__modal--carousel__header">
                                                                                RELATED PRODUCTS OF THE SERIES
                                                                            </div>
                                                                            <div class="productshow__modal--carousel__slider">
                                                                                @foreach ($categories as $category)
                                                                                    @foreach ($category->product as $item)
                                                                                        <div>
                                                                                            <a href="{{url($category->slug.'/chi-tiet/'.$item->slug)}}" class="productshow__modal--carousel__slider--component">
                                                                                                <div class="productshow__modal--carousel__slider--img">
                                                                                                    <img src="{{$item->avatar}}">
                                                                                                </div>
                                                                                                <div class="productshow__modal--carousel__slider--price">
                                                                                                    @if ($productItem->price1 != null)
                                                                                                        <span class="productshow__modal--price__1">{{$productItem->price1}}<i class="fas fa-euro-sign"></i></span>
                                                                                                    @endif
                                                                                                    <span class="productshow__modal--price__2">{{$productItem->price2}}<i class="fas fa-euro-sign"></i></span>
                                                                                                </div>
                                                                                                <div class="productshow__modal--carousel__slider--category">
                                                                                                    {{$category->category}}
                                                                                                </div>
                                                                                                <div class="productshow__modal--carousel__slider--name">
                                                                                                    {{$item->name}}
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <script>
                                                    var myColor = document.myproducthot{{$productItem->id}}.color;
                                                    var prev = null;
                                                    for (var i = 0; i < myColor.length; i++) {
                                                        myColor[i].addEventListener('change', function() {
                                                            (prev) ? console.log(prev.value): null;
                                                            if (this !== prev) {
                                                                prev = this;
                                                            }
                                                            var x = this.value;
                                                            document.getElementById('printcolorhot{{$productItem->id}}').style.backgroundColor = x;
                                                        });
                                                    }
                                                    function getCombohot{{$productItem->id}}(selectObject) {
                                                        var value = selectObject.value;
                                                        document.getElementById('printSizehot{{$productItem->id}}').innerHTML = value;
                                                        console.log(value);
                                                    }
                                                </script>
                                            </div>

                                            <!-- end -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    @if (count($submenuCategory->where('showindex',1)->where('type',1)) > 0)

        <section class="main__thu__ba">
            <div class="container">
                <div class="main__thu__ba__tieu__de__1">
                    <span>Our catalog</span>
                </div>
                <div class="main__thu__ba__tieu__de__2">
                    <span>Representative products catalog</span>
                </div>
                <div class="row">
                    @foreach ($categories->where('showindex',1) as $item)
                    <div class="col-12 col-sm-6 col-md-4 mb-2">

                        <div class="main__thu__ba__boc__anh__sp">
                            <img src="{{$item->image}}" alt="">
                            <div class="main__thu__ba__boc__anh__sp--btn">
                                <a href="{{$item->slug}}">{{$item->category}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (count($submenuCategory->where('submenu',1)->where('type',1)) > 0)
        <section class="main__thu__ba">
            <div class="container">
                <div class="main__thu__ba__tieu__de__1">
                    <span>Danh mục các sản phẩm subfooter</span>
                </div>
                <div class="main__thu__ba__tieu__de__2">
                    <span>sản phẩm subfooter được hiển thị trang chủ</span>
                </div>
                <div class="row">
                    @foreach ($submenuCategory->where('submenu',1) as $item)
                        <div class="col-12 col-sm-6 col-md-4 mb-2">
                            <div class="main__thu__ba__boc__anh__sp">
                                <img src="{{$item->image}}" alt="">
                                <div class="main__thu__ba__boc__anh__sp--btn">
                                    <a href="{{$item->slug}}">{{$item->category}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif
    @if (count($logo) > 0)
    <section>
        <div class="container">
            <div class="row">
                @foreach ($logo as $item)
                <div class="col-md-4 mb-2">
                    <a class="mai__thu__tu__anh__thuong__hieu" href="{{$item->link}}">
                        <img src="{{$item->logo}}" alt="">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@if (count($submenuCategory->where('submenu',1)->where('type',2)) > 0)
@foreach ($submenuCategory->where('submenu',1)->where('type',2) as $category)
            <section class="main__thu__nam">
                <div class="container">
                    <div class="main__thu__nam__tieu__de__1">
                        <span>{{$category->category}}</span>
                    </div>
                    <div class="main__thu__nam__tieu__de__2">
                        <span>{{$category->text}}</span>
                    </div>
                    <div class="owl-carousel-2">
                        @foreach ($category->about->where('showindex',1) as $about)
                        <div>
                            <a href="{{url($category->slug.'/chi-tiet/'.$about->slug)}}" class="owl-carousel-2__item">
                                <img class="owl-carousel-an-1" src="{{$about->image}}" alt="">
                                <div class="owl-carousel-an-2">
                                    <i class="fab fa-instagram"></i>
                                    <span class="owl-carousel-2__item--name">{{$about->name}}</span>
                                    <div class="owl-carousel-2__item--text">
                                        {!!$about->text!!}
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @endforeach
@endif

</main>
@endsection
