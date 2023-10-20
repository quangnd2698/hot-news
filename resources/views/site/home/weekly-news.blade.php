@if (!empty($allNewsByCategories))
    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Tin hot trong tuần</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            @foreach ($allNewsByCategories as $item)
                                <a href="{{ route('category.detail', ['slug' => $item->slug]) }}">
                                    <div class="weekly2-single">
                                        <div class="weekly2-img">
                                            <img src="{{ $item->image_url ? $item->image_url : '' }}" alt="">
                                        </div>
                                        <div class="weekly2-caption">
                                            <span
                                                class="color1">{{ $item->firstCategory ? $item->firstCategory : '' }}</span>
                                            <h6>{{ $item->title ? $item->title : '' }}</h6>
                                            <small class="news-short-description line-clamp-2">
                                                {{ !empty($item->short_description) ? $item->short_description : '' }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
