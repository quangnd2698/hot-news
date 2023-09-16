<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            @include('site.common.treding-title')
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    @if (!empty($newsest))
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="{{ !empty($newsest->image_url) ? $newsest->image_url : '' }}" alt="">
                                <div class="trend-top-cap">
                                    @if ($newsest->firstCategory)
                                        <span>{{ $newsest->firstCategory }}</span>
                                    @endif
                                    <h2><a
                                            href="{{ route('category.detail', ['slug' => $newsest->slug]) }}">{{ $newsest->title }}</a>
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
                                                    <span
                                                        class="color1">{{ $item->firstCategory ? $item->firstCategory : '' }}</span>
                                                </div>
                                                <div class="trend-bottom-cap pt-10">

                                                    <h6>{{ $item->title ? $item->title : '' }}</h6>
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
                                        <span
                                            class="color1">{{ $item->firstCategory ? $item->firstCategory : '' }}</span>
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
