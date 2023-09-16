@extends('site.master')
@section('style')
@endsection
@section('content')
    <div class="about-area">
        <div class="container">
            <!-- Hot Aimated News Tittle-->
            @include('site.common.treding-title')
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                        <div class="section-tittle mb-30">
                            <h3>{{ !empty($news->title) ? $news->title : '' }}</h3>
                        </div>
                        {{-- <div class="about-img">
                            <img src="{{ !empty($news->image_url) ? asset($news->image_url) : '/site/assets/img/trending/trending_top.jpg' }}" alt="">
                        </div> --}}
      
                        <div class="about-prea">
                            {!! $news->content !!}
                        </div>

                        <div class="social-share pt-30">
                            <div class="section-tittle">
                                <h3 class="mr-20">Share:</h3>
                                <ul>
                                    <li><a href="#"><img src="/site/assets/img/news/icon-ins.png" alt=""></a>
                                    </li>
                                    <li><a href="#"><img src="/site/assets/img/news/icon-fb.png" alt=""></a>
                                    </li>
                                    <li><a href="#"><img src="/site/assets/img/news/icon-tw.png" alt=""></a>
                                    </li>
                                    <li><a href="#"><img src="/site/assets/img/news/icon-yo.png" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- From -->
                </div>
                @include('site.news.right')
            </div>
        </div>
    </div>
@endsection
