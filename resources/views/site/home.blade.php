@extends('site.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('site/assets/css/home.css') }}">
@endsection
@section('content')
    <!-- Trending Area Start -->
    @include('site.home.trending')
    <!-- Trending Area End -->
    <!--   Weekly-News start -->

    <!-- End Weekly-News -->
    <!-- Whats New Start -->
    @include('site.home.list-by-category')
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    @include('site.home.weekly-news')
@endsection
