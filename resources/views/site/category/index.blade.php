@extends('site.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('site/assets/css/home.css') }}">
@endsection
@section('content')
    @include('site.category.trending')
@endsection
