@extends('frontend.app')
@section('title')
Danh sách
@endsection
@section('content')
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
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

</main>
@endsection
