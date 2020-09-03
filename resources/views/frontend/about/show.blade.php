@extends('frontend.app')
@section('title')
{{ $content->name }}
@endsection
@section('content')
<!-- phần banner quảng cáo -->

<main>
    <div class="container">
        <div ><a class="neu__contact" href="/">Home</a> > <a class="neu__contact--link" href="{{url($content->category->first()->slug)}}">{{$content->category->first()->category}}</a>> <a class="neu__contact--link" href="">{{$content->name}}</a></div>
    </div>
    <section class="about">
        <div class="container">
            <div  class="about--img">
                <img src="{{$content->image}}" alt="">
            </div>
            <div class="about--name">
                {{$content->name}}
            </div>
            <div class="about--content">
                {!!$content->editor!!}
            </div>
        </div>
    </section>
</main>
@endsection
