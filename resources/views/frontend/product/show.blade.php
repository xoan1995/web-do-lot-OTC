@extends('frontend.app')
@section('title')
{{$product->name}}
@endsection
@section('content')
<main>
<div class="container">
    <a class="neu__contact" href="/">Home</a> >
<a class="neu__contact--link" href="{{url("$categoryFirst->slug")}}">{{$categoryFirst->category}}</a> >
<a class="neu__contact--link" href="{{url("$categoryFirst->slug/chi-tiet/$product->slug")}}">{{$product->name}}</a>
</div>
    <section class="productshow">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                            <div class="productshow__indicator">
                                <div class="productshow__indicator--slide">
                                    <div class="productshow__indicator--slide__img">
                                        <img src="{{$product->avatar}}" class="d-block w-100">
                                    </div>
                                </div>
                                @foreach ($product->gallery as $gallery)
                                    <div class="productshow__indicator--slide">
                                        <div class="productshow__indicator--slide__img">
                                            <img src="{{url(('/storage/gallery/').$gallery->img)}}" class="d-block w-100">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-9 align-self-center">
                            <div class="productshow__indicator__container">
                                <form action="{{route('cart.store')}}" method="post" class="productshow__indicator__container--heart">
                                    @csrf
                                    @method('POST')
                                    <input type="text" value="{{$product->id}}" hidden name="id">
                                    <input type="text" value="{{$product->name}}" hidden name="name">
                                    <input type="text" value="{{$product->price2}}" hidden name="price2">
                                    <input class="quantity" name="quantity" value="1" hidden type="number">
                                    <input type="text" value="#18171B" hidden name="color">
                                    <button type="submit" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__btn__2">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </form>
                                <div class="productshow__indicator--inner">
                                    <div>
                                        <div onmousemove="hover__zoom__img__1()" id="hover__zoom__img__1" class="productshow__indicator--item" style="background-image: url({{$product->avatar}})">
                                        </div>
                                    </div>

                                    @foreach ($product->gallery as $gallery)
                                        <div>
                                            <div onmousemove="hover__zoom__img__{{$gallery->id}}()" id="hover__zoom__img__{{$gallery->id}}" class="productshow__indicator--item" style="background-image: url({{url(('/storage/gallery/').$gallery->img)}})">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <script>
                                    function hover__zoom__img__1() {
                                        const image = document.querySelector('#hover__zoom__img__1');
                                        image.addEventListener('mousemove', function(e) {
                                            let width = image.offsetWidth;
                                            let height = image.offsetHeight;
                                            let mouseX = e.offsetX;
                                            let mouseY = e.offsetY;

                                            let bgPosX = (mouseX / width * 100);
                                            let bgPosY = (mouseY / height * 100);
                                            document.getElementById('hover__zoom__img__1').style.backgroundPosition = `${bgPosX}% ${bgPosY}%`;
                                        });
                                    }
                                </script>
                                @foreach ($product->gallery as $gallery)
                                    <script>
                                        function hover__zoom__img__{{$gallery->id}}() {
                                            const image = document.querySelector('#hover__zoom__img__{{$gallery->id}}');
                                            image.addEventListener('mousemove', function(e) {
                                                let width = image.offsetWidth;
                                                let height = image.offsetHeight;
                                                let mouseX = e.offsetX;
                                                let mouseY = e.offsetY;

                                                let bgPosX = (mouseX / width * 100);
                                                let bgPosY = (mouseY / height * 100);
                                                document.getElementById('hover__zoom__img__{{$gallery->id}}').style.backgroundPosition = `${bgPosX}% ${bgPosY}%`;
                                            });
                                        }
                                    </script>
                                @endforeach
                                @if (($product->price1 - $product->price2) > 0)
                                    <div class="productshow__indicator__container--saleoff">
                                        Sale: {{number_format ((($product->price1 -$product->price2) / ($product->price1))* 100)}}%
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-3">
                    <div class="productshow--header">
                        {{$product->name}}
                    </div>
                    @if ($product->type->first())
                    <div class="productshow--nametext">
                        {{$product->type->first()->name}}
                    </div>
                    @endif
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-12 col-md-4">
                            <div class="productshow__price">
                                @if ($product->price1 != null)
                                    <span class="productshow__price--price1">{{$product->price1}} <i class="fas fa-euro-sign"></i></span>
                                @endif

                                <span class="productshow__price--price2">{{$product->price2}} <i class="fas fa-euro-sign"></i></span>
                            </div>
                        </div>
                        @if ($user)
                            <div class="col-12 col-sm-12 col-md-8">
                                <div class="productshow--users">
                                    <span>Sale for <b>{{$user->name}}</b></span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <form name="myproduct" action="{{route('cart.addtocart')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="productshow--color">
                            <div  class="productshow--color__header">Color</div>
                            <div class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km">

                                @foreach ($product->Color()->get() as $color)
                                    <input type="radio" value="{{$color->color}}" hidden class="radio{{$color->id}}" name="color" id="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$color->id}}">
                                    <label class=" check__box custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$color->id}}">
                                        <div style="background-color: {{$color->color}};"></div>
                                    </label>
                                    <style>
                                        .radio{{$color->id}}:checked+.check__box{
                                            border-bottom: 2px solid black;
                                        }
                                    </style>
                                @endforeach
                            </div>
                        </div>
                        <div class="productshow--size">
                            <div class="productshow--size__header">Choose your size</div>
                            <select class="productshow--size__select" id="productSize" onchange="getComboA(this)" name="size">
                                <option selected disabled>Select your size</option>
                                @foreach ($product->Size()->get() as $size)
                                    <option>
                                        {{$size->size}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="productshow--size">
                            <div class="productshow--size__header">
                                <span>Quatity</span>
                            </div>
                                <input class="productshow--size__select" name="soluong" value="1" type="number">
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-md-12">
                                <button type="button" class="productshow--btn" data-toggle="modal" data-target="#{{$product->slug}}">
                                    Buy now <i class="fas fa-shopping-bag"></i>
                                </button>
                                <!-- Modal -->
                            </div>
                            <div class="modal fade" id="{{$product->slug}}" tabindex="-1" role="dialog" aria-labelledby="{{$product->slug}}Label" aria-hidden="true" style="z-index: 99999;" >
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title productshow__modal--title" id="{{$product->slug}}Label">THIS ITEM HAS BEEN ADDED TO YOUR BASKET</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="productshow__modal--img">
                                                    <img src="{{$product->avatar}}">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="productshow__modal--name">
                                                    <span>{{$product->name}}</span>
                                                </div>
                                                @if ($product->type->first())
                                                    <div class="productshow__modal--type">
                                                        <span>{{$product->type->first()->name}}</span>
                                                    </div>
                                                @endif
                                                <div class="productshow__modal--category">
                                                    <span>{{$categoryFirst->category}}</span>
                                                </div>
                                                <div class="productshow__modal--price">
                                                    @if ($product->price1 != null)
                                                        <span class="productshow__modal--price__1">{{$product->price1}} <i class="fas fa-euro-sign"></i></span>
                                                    @endif

                                                    <span class="productshow__modal--price__2">{{$product->price2}} <i class="fas fa-euro-sign"></i></span>
                                                    <span class="productshow__modal--price__user"></span>
                                                </div>
                                                <div class="productshow__modal--color">
                                                    <label class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$product->id}}">
                                                        @if (count($product->Color()->get()) == 1)
                                                            <div style="background-color: {{$product->Color()->first()->color}}"></div>
                                                        @else
                                                            <div id="printcolor"></div>
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="productshow__modal--color">
                                                     Size: <span id="printSize"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" value="{{$product->id}}" hidden name="id">
                                    <div class="modal-footer">
                                        <div class="col-5">
                                            <div class="productshow__modal__btn--close">
                                                <button type="button" data-dismiss="modal">Continue shopping</button>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5">
                                            <input type="text" value="{{$product->id}}" hidden name="productId">
                                            <input type="text" value="{{$product->name}}" hidden name="name">
                                            <input type="text" value="{{$product->price2}}" hidden name="price2">
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
                                                            <a href="{{url($categoryFirst->slug.'/chi-tiet/'.$item->slug)}}" class="productshow__modal--carousel__slider--component">
                                                                <div class="productshow__modal--carousel__slider--img">
                                                                    <img src="{{$item->avatar}}">
                                                                </div>
                                                                <div class="productshow__modal--carousel__slider--price">
                                                                    @if ($product->price1 != null)
                                                                        <span class="productshow__modal--price__1">{{$product->price1}} <i class="fas fa-euro-sign"></i></span>
                                                                    @endif
                                                                    <span class="productshow__modal--price__2">{{$product->price2}} <i class="fas fa-euro-sign"></i></span>
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
                    </form>
                    <script>
                        var myColor = document.myproduct.color;
                        var prev = null;
                        for (var i = 0; i < myColor.length; i++) {
                            myColor[i].addEventListener('change', function() {
                                (prev) ? console.log(prev.value): null;
                                if (this !== prev) {
                                    prev = this;
                                }
                                var x = this.value;
                                document.getElementById('printcolor').style.backgroundColor = x;
                            });
                        }
                        function getComboA(selectObject) {
                            var value = selectObject.value;
                            document.getElementById('printSize').innerHTML = value;
                            console.log(value);
                        }
                    </script>
                    <div  class="productshow--text">
                        <span>Sign up for now <img class="breathwell-natural-logo" src="{{$themes->logo}}"> and get discount on all your purchases as well as free shipping</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="productshow--info">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-sm-12 col-md-6 productshow--info__col1 p-3">
                    <ul class="nav nav-tabs row no-gutters" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Information</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">Advantages</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false">Size</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="contact" aria-selected="false">Restrict</a>
                          </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                            <div class="productshow--info__col1--content">
                                {!!$product->info1!!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <div class="productshow--info__col1--content">
                                {!!$product->info2!!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                            <div class="productshow--info__col1--content">
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="productshow--info__col1--content__size--header">
                                            DE size
                                        </div>
                                        <div class="productshow--info__col1--content__size--header">
                                            EU size
                                        </div>
                                        <div class="productshow--info__col1--content__size--header">
                                            FIT SMART
                                        </div>
                                    </div>
                                    <div class="col-10">
                                            <div class="productshow--info__col1--content--container">
                                                @foreach ($product->size as $size)
                                                <div class="productshow--info__col1--content__size">
                                                    <div class="productshow--info__col1--content__size--header">
                                                        {{$size->size}}
                                                    </div>
                                                    <div class="productshow--info__col1--content__size--header">
                                                        {{$size->size2}}
                                                    </div>
                                                    <div class="productshow--info__col1--content__size--header">
                                                        {{$size->sizefix}}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                    </div>
                                </div>
                                {!!$product->info3!!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                            <div class="productshow--info__col1--content">
                                {!!$product->info4!!}
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

    </section>
    <section>
        <div class="container">
            @foreach ($categories as $category)
                @foreach ($category->product as $productItem)
                    @if (count($category->product) > 0)
                        <div class="card custom__carousel__card__thong__tin__san__pham mt-3">
                            <div class="card-body">
                                <div class="custom__carousel__card__thong__tin__san__pham__tieu__de"><span>QUICK VIEW</span></div>
                                    <div class="custom__carousel__card__thong__tin__san__pham__boc__chua">

                                    <div class="row">

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
                                                            <span>Sale: {{number_format ((($productItem->price1 -$productItem->price2) / ($productItem->price1))* 100)}}%</span>
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
                                                @if ($productItem->price1 != null)
                                                    <span class="productshow__modal--price__1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                @endif
                                                <span class="productshow__modal--price__2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                                <span class="productshow__modal--price__user"></span>
                                                <div>{!!$productItem->option!!}</div>
                                            </div>

                                            <div class="custom__carousel__card__thong__tin__san__pham__tieu__de__noi__dung__nd">
                                                {!!$productItem->info1!!}
                                            </div>

                                        </div>

                                        <div class="col-6">
                                            <form name="myproduct{{$productItem->id}}" action="{{route('cart.addtocart')}}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="row no-gutters">
                                                    <div class="col-3">
                                                        <span>Color</span>
                                                    </div>

                                                    <div class="col-9">
                                                        @foreach ($productItem->Color()->get() as $color)
                                                            <input type="radio" hidden value="{{$color->color}}" class="radio{{$color->id}}" name="color" id="{{$productItem->slug}}{{$color->id}}">
                                                            <label class="check__box custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="{{$productItem->slug}}{{$color->id}}">
                                                                <div style="background-color: {{$color->color}};">

                                                                </div>
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

                                                    <div class="row no-gutters mt-3">
                                                        <div class="col-3">
                                                            <span>Size</span>
                                                        </div>
                                                        <div class="col-5">
                                                            <select  id="productSize{{$productItem->id}}" onchange="getCombo{{$productItem->id}}(this)" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__kc__boc__1__label">
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
                                                        <button type="button" class="productshow--btn" data-toggle="modal" data-target="#{{$productItem->slug}}{{$productItem->id}}" class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__btn__1">
                                                            Buy now <i class="fas fa-shopping-bag"></i>
                                                        </button>
                                                    </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="{{$productItem->slug}}{{$productItem->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$productItem->slug}}Label" aria-hidden="true" >
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title productshow__modal--title" id="{{$product->slug}}Label">THIS ITEM HAS BEEN ADDED TO YOUR BASKET</h5>
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
                                                                        <span>{{$categoryFirst->category}}</span>
                                                                    </div>
                                                                    <div class="productshow__modal--price">
                                                                        @if ($productItem->price1 != null)
                                                                            <span class="productshow__modal--price__1">{{$productItem->price1}} <i class="fas fa-euro-sign"></i></span>
                                                                        @endif

                                                                        <span class="productshow__modal--price__2">{{$productItem->price2}} <i class="fas fa-euro-sign"></i></span>
                                                                        <span class="productshow__modal--price__user"></span>
                                                                    </div>
                                                                    <div class="productshow__modal--color">
                                                                        <label class="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m" for="custom__carousel__card__thong__tin__san__pham__so__luong__kich__co__ms__km__radio__m{{$product->id}}">
                                                                            @if (count($productItem->Color()->get()) == 1)
                                                                                <div style="background-color: {{$productItem->Color()->first()->color}}"></div>
                                                                            @else
                                                                                <div id="printcolor{{$productItem->id}}"></div>
                                                                            @endif
                                                                        </label>
                                                                    </div>
                                                                    <div class="productshow__modal--color">
                                                                            Size: <span id="printSize{{$productItem->id}}"></span>
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
                                                                                <a href="{{url($categoryFirst->slug.'/chi-tiet/'.$item->slug)}}" class="productshow__modal--carousel__slider--component">
                                                                                    <div class="productshow__modal--carousel__slider--img">
                                                                                        <img src="{{$item->avatar}}">
                                                                                    </div>
                                                                                    <div class="productshow__modal--carousel__slider--price">
                                                                                        <span class="productshow__modal--price__1">{{$product->price1}} <i class="fas fa-euro-sign"></i></span>
                                                                                        <span class="productshow__modal--price__2">{{$product->price2}} <i class="fas fa-euro-sign"></i></span>
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
                                            </form>
                                            <script>
                                                var myColor = document.myproduct{{$productItem->id}}.color;
                                                var prev = null;
                                                for (var i = 0; i < myColor.length; i++) {
                                                    myColor[i].addEventListener('change', function() {
                                                        (prev) ? console.log(prev.value): null;
                                                        if (this !== prev) {
                                                            prev = this;
                                                        }
                                                        var x = this.value;
                                                        document.getElementById('printcolor{{$productItem->id}}').style.backgroundColor = x;
                                                    });
                                                }
                                                function getCombo{{$productItem->id}}(selectObject) {
                                                    var value = selectObject.value;
                                                    document.getElementById('printSize{{$productItem->id}}').innerHTML = value;
                                                }
                                            </script>
                                        </div>

                                        <!-- end -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </section>

</main>
@endsection
