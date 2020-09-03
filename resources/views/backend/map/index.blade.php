
@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="card card-primary">
    <form class="card-body" action="{{route('admin.maps.update',1)}}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Tóm tắt</label>
        <textarea class="summernote" name="text">{{$maps->text}}</textarea>
        </div>
        <div class="form-group">
            <label>Nội dung về shop</label>
        <textarea class="summernote" name="info">{{$maps->info}}</textarea>
        </div>
        <div class="form-group">
            <label>Bản đồ</label>
        <textarea class="summernote" name="maps">{{$maps->maps}}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Cập nhật</button>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script type="text/javascript" src="{{asset('js/admin_custom.js')}}"></script>
@stop
