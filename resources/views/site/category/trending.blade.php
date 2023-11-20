<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            @if (empty($hiddenTreding))
                @include('site.common.treding-title')
            @endif
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    @if (!empty($newsest))
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="{{ !empty($newsest->image_url) ? $newsest->image_url : '' }}" alt="">
                                <div class="trend-top-cap">
                                    <h2><a
                                            href="{{ route('category.detail', ['slug' => $newsest->slug]) }}">{{ $newsest->title }}</a>
                                        <p class="news-short-description text-white">
                                            {{ !empty($newsest->short_description) ? $newsest->short_description : '' }}
                                        </p>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Trending Bottom -->
                    @if (!empty($trendings))
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($trendings as $item)
                                    <div class="col-lg-4">
                                        <a href="{{ route('category.detail', ['slug' => $item->slug]) }}">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img">
                                                    <img src="{{ $item->image_url ? $item->image_url : '' }}"
                                                        alt="">
                                                </div>
                                                <div class="trend-bottom-cap pt-10">

                                                    <h6>{{ $item->title ? $item->title : '' }}</h6>
                                                    <small class="news-short-description">
                                                        {{ !empty($item->short_description) ? $item->short_description : '' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
                <!-- Riht content -->
                @if (!empty($rightTrendings))
                    <div class="col-lg-4">
                        @foreach ($rightTrendings as $item)
                            <a href="{{ route('category.detail', ['slug' => $item->slug]) }}">
                                <div class="trand-right-single d-grid">
                                    <div class="trand-right-img">
                                        <img src="{{ $item->image_url ? $item->image_url : '' }}" alt="">
                                    </div>
                                    <div class="trand-right-cap">
                                        <h6>{{ $item->title ? $item->title : '' }}
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
