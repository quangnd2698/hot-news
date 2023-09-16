@if ($categories)
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Có gì mới</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Tất cả</a>
                                        @foreach ($categories as $item)
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="{{ $item->slug }}" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($allNewsByCategories as $item)
                                                <div class="col-lg-3 col-md-3">
                                                    <a href="{{ route('category.detail', ['slug' => $item->slug]) }}">
                                                        <div class="single-what-news mb-2">
                                                            <div class="what-img">
                                                                <img src="{{ !empty($item->image_url) ? $item->image_url : '' }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="trend-bottom-cap pt-10">

                                                                <h6>{{ $item->title ? $item->title : '' }}</h6>
                                                            </div>
                                                            {{-- <div class="what-cap">
                                                        <span class="color1">{{$item->firstCategory ? $item->firstCategory : ''}}</span>
                                                        <h6 class="single-what-news-title"><a href="{{$item->slug}}">{{$item->title ? $item->title : ''}}</a></h6>
                                                    </div> --}}
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Card two -->
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews1.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews2.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews3.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews4.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card three -->
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews1.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews2.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews3.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews4.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card fure -->
                                <div class="tab-pane fade" id="nav-last" role="tabpanel"
                                    aria-labelledby="nav-last-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews1.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews2.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews3.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews4.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card Five -->
                                <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel"
                                    aria-labelledby="nav-Sports">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews1.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews2.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews3.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews4.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card Six -->
                                <div class="tab-pane fade" id="nav-techno" role="tabpanel"
                                    aria-labelledby="nav-technology">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews1.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews2.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews3.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="site/assets/img/news/whatNews4.jpg" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">Night party</span>
                                                        <h4><a href="#">Welcome To The Best Model Winner
                                                                Contest</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
