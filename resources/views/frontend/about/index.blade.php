@extends('frontend.app')
@section('title')
{{ $themes->title }}
@endsection
@section('content')
<!-- phần banner quảng cáo -->

<main>
    <div class="container">
        <div ><a class="neu__contact" href="/">Home</a> > <a class="neu__contact--link" href="{{url($categories->slug)}}">{{$categories->category}}</a></div>
    </div>
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
    <section class="about">
        <div class="container">
                @foreach ($about as $item)
                    <a href="{{$item->category->first()->slug.'/chi-tiet/'.$item->slug}}" class="about__list">
                        <div class="row">
                            <div class="col-md-4">
                                <div  class="about--img">
                                    <img src="{{$item->image}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="about--name">
                                    {{$item->name}}
                                </div>
                                <div class="about--date">
                                    {{$item->created_at}}
                                </div>
                                <div class="about--text">
                                    {{$item->text}}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            {{$about->links()}}
        </div>
    </section>
</main>
@endsection
