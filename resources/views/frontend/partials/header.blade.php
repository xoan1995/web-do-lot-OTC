 <!-- phần header -->
 <header>
    <!-- container của header -->

        <!-- phần code của header -->
        <div class="header__chinh">
            <div class="container">
                {{-- <a class="header__a__trai" ><span></span></a> --}}
                    {{-- <a class="header__a__giua" href=""><span>Verlängertes Rückgaberecht von 30 Tagen</span></a> --}}
                <a class="header__a__phai" href="tel::{{$themes->hotline}}"><span>Hotline: {{$themes->hotline}} </span></a>
            </div>
        </div>
        <div class="container">
        <!-- phần code của logo nằm trong header -->
            <div class="row no-gutters">
                <div class="col-md-4"></div>
                <div class="col-md-4 pt-5">
                    <a href="/" class="header__logo__images">
                        <img src="{{$themes->logo}}" alt="">
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="header__logo__gocphai">
                        <div class="row no-gutters pt-3">
                            <div class="col-1">

                            </div>
                            <div class="col-3">
                                <a href="{{route('login')}}" class="header__bieu__tuong__1">
                                    <i class="far fa-user"></i>
                                    @if ($user)
                                        <span>{{$user->name}}</span>
                                    @else
                                        <span>Login/ Register</span>
                                    @endif

                                </a>
                            </div>
                            <div class="col-3">
                                <a href="{{url("cart")}}" class="header__bieu__tuong__2">
                                    <i class="far fa-heart"></i>
                                    <span>Wish-list</span>
                                    <div class="header__bieu__tuong__2--count">
                                        {{Cart::instance('default')->count()}}
                                    </div>

                                </a>
                            </div>
                            <div class="col-2">
                                <a href="#" class="header__bieu__tuong__3" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Map</span>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="{{url("cart")}}" class="header__bieu__tuong__4">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span>{{Cart::instance('saveForLater')->total(0)}} $</span>
                                </a>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header header--modal__header">
                                    <div class="header--modal__logo">
                                        <img src="{{$themes->logo}}">
                                    </div>
                                    <span class="header--modal__title">{{$themes->title}}</span>
                                    <button type="button" class="close header--modal__btn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="header--modal__text">
                                    {!!$maps->text!!}
                                </div>
                                <div class="modal-body">
                                    <div class="row no-gutters">
                                        <div class="col-4 p-3">
                                            {!!$maps->info!!}
                                        </div>
                                        <div class="col-8">
                                            {!!$maps->maps!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="header__logo--search">
                            <form class="row no-gutters mt-3" method="POST" action="{{route('search')}}" >
                                @csrf
                                @method('POST')
                                <div class="col-11">
                                    <input type="text" class="header__logo--search__input" name="search" placeholder="Search">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="header__logo--search__btn" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="header__logo__khung__search__ipad">
                        <input type="text" placeholder="Search">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>

            </div>

            <!-- phần code của menu -->

            <section class="header__menu">
                <div class="row no-gutters align-items-start mt-3">
                    @foreach ($menu as $parentmenu)
                            <div class="col mema__menu__drop">
                                {{$parentmenu->label}}
                            </div>
                            <div class="header__menu__hover__mega__1">
                                <div class="row">
                                    @foreach ($parentmenu->category->where('showmenu',1)->chunk(5) as $chunk)
                                        <div class="col-2">
                                            @foreach ($chunk as $item)
                                            <div class="boc__1__mega__menu__nd__2"><a href="{{url("$item->slug")}}"><span>{{$item->category}}</span></a></div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                    @endforeach
                    {{-- <div class="col-1 align-self-end">
                        <a href="{{route('lien-he.index')}}" class="mema__menu__drop" style="text-align: right">
                            Liên hệ
                        </a>
                    </div> --}}
                    @foreach ($menu as $parentmenu)
                        @foreach ($parentmenu->category->where('type',2)->where('category_id',null) as $item)
                            <div class="col-1 align-self-end">
                                <a href="{{url("$item->slug")}}" class="mema__menu__drop--news" style="text-align: right">
                                {{$item->category}}
                                </a>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </section>
        </div>
        <div class="nav__mobile">
            <input type="checkbox" id="nav__mobile__button__checkbox">
            <label id="nav__mobile__button__open" class="nav__mobile__button__open nav__mobile__button__icon"
                for="nav__mobile__button__checkbox">
                <i class="fas fa-align-justify"></i>
            </label>
            <nav class="nav__mobile__container">

                <div class="nav__mobile__item">
                    <label class="nav__mobile__button__close nav__mobile__button__icon"
                        for="nav__mobile__button__checkbox">
                        <i class="fas fa-angle-left"></i>
                    </label>
                    <a href="/" class="nav__mobile__item__menu">
                        <i class="fas fa-home"></i>
                        <span>Trang chủ</span>
                    </a>
                    @foreach ($menu as $parentmenu)
                    @if (count($parentmenu->category) >0)
                        <a href="#" class="nav__mobile__item__menu">
                            <span>{{$parentmenu->label}}</span>

                            <i class="fas fa-chevron-down"></i>

                        </a>
                        <ul class="nav__mobile__item__menu--sub">
                            @foreach ($parentmenu->category as $item)
                            <li>
                                <a href="{{url($item->slug)}}">
                                    {{$item->category}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <a href="#" class="nav__mobile__item__menu">
                            <span>{{$parentmenu->label}}</span>
                        </a>
                    @endif
                    @endforeach
                </div>
            </nav>
        </div>
</header>
