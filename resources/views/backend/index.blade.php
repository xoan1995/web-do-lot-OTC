
@extends('adminlte::page')

@section('title', 'Quản trị')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
@if(session()->has('flash'))
<div class="alert alert-light">
    {{ session()->get('flash') }}
</div>
@endif
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
