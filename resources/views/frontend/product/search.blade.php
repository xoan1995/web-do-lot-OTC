@extends('frontend.app')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
<main class="neu">
    <div class="container">
            <!-- duong dan -->
            <div ><a class="neu__contact" href="/">Home</a>
                @if ($categories != null)
                > <a class="neu__contact--link" href="{{url($categories->slug)}}">{{$categories->category}}</a>
                @endif
            </div>

            <!-- baner quang cao -->
        @if(count($banner->where('type',2)) > 0)
            @foreach($banner->where('type',2) as $item)
                <section class="main__dau__tien">
                        <a href="{{ $item->link }}" class="main__dau__tien__img">
                            <img src="{{ $item->banner }}" alt="">
                        </a>
                        <!-- bỏ qua phần main thứ hai carousel sản phẩm -->
                </section>
            @endforeach
        @endif
        @if ($categories != null)
        <section class="neu__baner">

                <div class="neu__baner__title">
                    <span>{{$categories->category}}</span>
                </div>
                <div class="neu__baner__text">
                    <span>{{$categories->text}}</span>
                </div>


            <div class="neu__baner__image">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="{{$categories->image}}" alt="" />
                    </div>
                    <div class="col-md-10">
                        <div style="background-color: #D8CFD0;height: 100%;"></div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @if ($categories != null)
            <!-- menu tim kiem -->
            <section class="neu">
                <!-- menu tim kiem -->
                <div class="neu__menu_search">
                            <div class="row no-gutters">
                                <div class="col-md-4 col-lg-3">
                                    <div class="neu__menu_search__item_1">
                                        <input type="checkbox" id="neu__menu_search__item_1__checkbox" />
                                        <label class="neu__menu_search__item__label" for="neu__menu_search__item_1__checkbox">
                                                <span class="neu__menu_search__item__title">Product type</span>
                                                <span class="neu__menu_search__item__button"><i class="fas fa-chevron-down"></i></span>
                                            </label>

                                        <div class="neu__menu_search__item_1__form_search">

                                                <form method="POST" action="{{route('search',$categories->slug)}}" class="neu__menu_search__item__size__label_search">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="text" name="search"/>
                                                    <button type="submit" class="neu__menu_search__item__size__label_search--btn">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </form>

                                                <form action="{{route('searchType',$categories->slug)}}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="neu__menu_search__item__size__form_category__select">
                                                        @foreach ($type as $item)
                                                        <input type="radio" name="type" class="neu__menu_search__item__size__form_category__select--radio" hidden value="{{$item->slug}}" id="type{{$item->id}}">
                                                            <label class="row no-gutters mb-1 neu__menu_search__item__size__form_category__select--label" for="type{{$item->id}}">
                                                                <div class="col-4">
                                                                    <div class="neu__menu_search__item__size__form_category__select--img">
                                                                        <img src="{{$item->img}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-8">
                                                                    <div class="neu__menu_search__item__size__form_category__select--text">
                                                                        {{$item->name}}
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                    <div class="neu__menu_search__item__size__form_search__submit " id="show_hiden_submit">
                                                        <button type="submit">Confirm</button>
                                                    </div>
                                                </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3">
                                    <div class="neu__menu_search__item_2">
                                        <input type="checkbox" id="neu__menu_search__item_2__checkbox" />
                                        <label class="neu__menu_search__item__label" for="neu__menu_search__item_2__checkbox">
                                                <span class="neu__menu_search__item__title">Color</span>
                                                <span class="neu__menu_search__item__button"><i class="fas fa-chevron-down"></i></span>
                                            </label>
                                        <form action="{{route('searchColor',$categories->slug)}}" method="POST" class="neu__menu_search__item_2__form_search">
                                            @csrf
                                            @method('POST')
                                            <div class="row ml-1">
                                                @foreach ($color as $item)
                                                    <div class="col-2 mt-1">
                                                        <a class="checkboxFive">
                                                            <input type="checkbox" name="color[]" value="{{$item->color}}" id="checkboxFiveInput{{$item->id}}" />
                                                            <label for="checkboxFiveInput{{$item->id}}" style="background-color: {{$item->color}};"></label>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="neu__menu_search__item_2__form_search__submit" id="show_hiden_submit">
                                                <button type="submit">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3">
                                    <div class="neu__menu_search__item_3">
                                        <input type="checkbox" id="neu__menu_search__item_3__checkbox" />
                                        <label class="neu__menu_search__item__label" for="neu__menu_search__item_3__checkbox">
                                                <span class="neu__menu_search__item__title">Price (<i style="font-size: 12px" class="fas fa-euro-sign"></i>)</span>
                                                <span class="neu__menu_search__item__button"><i class="fas fa-chevron-down"></i></span>
                                            </label>
                                        <form action="{{route('searchRange',$categories->slug)}}" method="POST" class="neu__menu_search__item_3__form_search">
                                            @csrf
                                            @method('POST')
                                            <div class="neu__menu_search__item_3__form_search__select">
                                                <div class="neu__menu_search__item_3__form_search__select__price">
                                                    <input id="range_1" type="text" name="range" value="">
                                                </div>
                                            </div>
                                            <div class="neu__menu_search__item_3__form_search__submit" id="show_hiden_submit">
                                                <button type="submit">Confirm</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <script>
                                    $(function () {
                                        $('#range_1').ionRangeSlider({
                                        min     : {{$price->min('price2')}},
                                        max     : {{$price->max('price2')}},
                                        from    : {{$price->min('price2')}},
                                        to      : {{$price->max('price2')}},
                                        type    : 'double',
                                        step    : 100,
                                        prefix  : '$',
                                        prettify: false,
                                        hasGrid : true
                                        })
                                    });
                                </script>
                                <div class="col-md-4 col-lg-3">
                                    <div class="neu__menu_search__item_4">
                                        <input type="checkbox" id="neu__menu_search__item_4__checkbox" />
                                        <label class="neu__menu_search__item__label" for="neu__menu_search__item_4__checkbox">
                                                <span class="neu__menu_search__item__title">Size</span>
                                                <span class="neu__menu_search__item__button"><i class="fas fa-chevron-down"></i></span>
                                            </label>
                                        <form action="{{route('searchSize',$categories->slug)}}" method="POST" class="neu__menu_search__item_4__form_search">
                                            @csrf
                                            @method('POST')
                                            <div class="neu__menu_search__item_4__form_search__select">
                                                @foreach ($size as $item)
                                                    <label for="size{{$item->id}}"><input name="size[]" type="checkbox" id="size{{$item->id}}" value="{{$item->size}}" /><span> {{$item->size}}</span></label>
                                                @endforeach
                                            </div>
                                            <div class="neu__menu_search__item_4__form_search__submit" id="show_hiden_submit">
                                                <button type="submit">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                </div>
            </section>
        @endif
            <!-- san pham -->
        <section >
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="neu__list_product__general_information">
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="neu__list_product__general_information__text">
                                        <span>{{count($products)}} Sản phẩm</span>
                                </div>
                            </div>
                            {{-- <div class="col-6 col-md-6 col-lg-6">
                                <div class="neu__list_product__general_information__item">
                                    <span>Sort by</span>
                                    <select>
                                        <option value="1">
                                            <a href="#"><span>Tên</span></a>
                                        </option>
                                        <option value="2">
                                            <a href="#"><span>Giá từ thấp đến cao</span></a>
                                        </option>
                                        <option value="3">
                                            <a href="#"><span>Giá từ cao đến thấp</span></a>
                                        </option>
                                        <option value="4">
                                            <a href="#"><span>Khuyến mãi</span></a>
                                        </option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="neu__list_product" id="accordionExample">
            @foreach ($products->chunk(4) as $chunk)
                <div class="neu__list_product--item mb-3">
                    <div class="row no-gutters">
                        @foreach ($chunk as $productItem)
                            <div class="col-md-3">
                                <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua">
                                    @foreach ($productItem->Category()->get()->take(1) as $category)
                                        <a href="{{url($category->slug.'/chi-tiet/'.$productItem->slug)}}" class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__anh">
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
                                        <div class="custom__carousel__and__multiple__targets__carousel-item__d-block__w-100__boc__chua__ttsp__gia">
                                            <div class="productshow__price">
                                                <span class="productshow__price--price1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                <span class="productshow__price--price2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                            </div>
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
                            <div class="custom-accordion">
                                <div class="card custom__carousel__card__thong__tin__san__pham">
                                    <div id="{{$productItem->slug}}{{$productItem->id}}-1" class="collapse" aria-labelledby="{{$productItem->slug}}{{$productItem->id}}-1" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="custom__carousel__card__thong__tin__san__pham__tieu__de"><span>{{$productItem->name}}</span></div>

                                            <div class="custom__carousel__card__thong__tin__san__pham__boc__chua">
                                                <!-- carousel trong thông tin sản phẩm -->

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
                                                                <div class="custom__carousel__card__thong__tin__san__pham__carousel__item__giam__gia">
                                                                    @if (($productItem->price1 - $productItem->price2) > 0)
                                                                        <span>
                                                                            Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @foreach ($productItem->gallery as $gallery)
                                                                <div class="carousel-item custom__carousel__card__thong__tin__san__pham__carousel__item">
                                                                    <img class="d-block w-100" src="{{url(('/storage/gallery/').$gallery->img)}}">
                                                                    <div class="custom__carousel__card__thong__tin__san__pham__carousel__item__giam__gia">
                                                                        @if (($productItem->price1 - $productItem->price2) > 0)
                                                                            <span>Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</span>
                                                                        @endif
                                                                    </div>
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
                                                            <span>{{$productItem->nametext}}</span>
                                                        </div>
                                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__tt">
                                                            <span>{{$productItem->nametext2}}</span>
                                                        </div>
                                                        <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__gia">
                                                            <div class="productshow__price">
                                                                <span class="productshow__price--price1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
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
                                                                        <input type="radio" value="{{$color->color}}" hidden class="radio{{$color->id}}" name="color" id="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$color->id}}">
                                                                            <label class="check__box custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$color->id}}">
                                                                                <div style="background-color: {{$color->color}};"></div>
                                                                            </label>
                                                                            <style>
                                                                                .radio{{$color->id}}:checked+.check__box{
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
                                                                <div class="col-6">
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
                                                                                            <label class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$color->id}}">
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
                                                                                            @foreach ($category->product as $item)
                                                                                                <div>
                                                                                                    <a href="{{url($category->slug.'/chi-tiet/'.$item->slug)}}" class="productshow__modal--carousel__slider--component">
                                                                                                        <div class="productshow__modal--carousel__slider--img">
                                                                                                            <img src="{{$item->avatar}}">
                                                                                                        </div>
                                                                                                        <div class="productshow__modal--carousel__slider--price">
                                                                                                            @if ($productItem->price1 != null)
                                                                                                                <span class="productshow__modal--price__1">{{$item->price1}}<i class="fas fa-euro-sign"></i></span>
                                                                                                            @endif
                                                                                                            <span class="productshow__modal--price__2">{{$item->price2}}<i class="fas fa-euro-sign"></i></span>
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
                                                <!-- end -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
        <script>

            $(document).mouseup(function(e)
            {
                var container = $("#neu__menu_search__item__size__form_search");

                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0)
                {
                    document.getElementsByName("neu__menu_search__item__size__form_search").style.display = "none";
                }
            });
        </script>
    </div>
</main>
@endsection
