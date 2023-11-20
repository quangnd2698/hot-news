@extends('site.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('site/assets/css/home.css') }}">
@endsection
@section('content')
    <div class="container mt-3">
        <h5 class="category-title">{{$category->name}}</h5>
    </div>
    @include('site.category.trending', ['hiddenTreding' => 1])
    @include('site.category.list')
@endsection
