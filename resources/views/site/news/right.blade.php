<div class="col-lg-4 right-news">
    <!-- Section Tittle -->
    <div class="section-tittle">
        <h3>Tin tức liên quan</h3>
    </div>
    <!-- Flow Socail -->
    <div class="single-follow mb-45">
        @if (!empty($trendings))
            @foreach ($trendings as $item)
                <a href="{{ route('category.detail', ['slug' => $item->slug]) }}">
                    <div class="trand-right-single d-grid">
                        <div class="trand-right-img">
                            <img src="{{ $item->image_url ? asset($item->image_url) : '' }}" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1">{{ $item->firstCategory ? $item->firstCategory : '' }}</span>
                            <h6>{{ $item->title ? $item->title : '' }}</h6>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif

    </div>
</div>
