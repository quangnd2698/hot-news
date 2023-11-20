<div class="container category-detail mt-3 p-3">
    <div class="list-news">
        @if (!empty($listNews))
            @foreach ($listNews as $news)
                <div class="news-item">
                    <div class="image">
                        <img class="news-item-img" src="{{!empty($news->image_url) ? $news->image_url : ''}}" alt="">
                    </div>
                    <div class="news-detail pl-3">
                        <h5>{{$news->title}}</h5>
                        <p class="short-description">{{ !empty($news->short_description) ? $news->short_description : ''}}</p>
                    </div>
                </div>
            @endforeach
            {{-- {{ $listNews->links()}} --}}
        @endif
        

    </div>
</div>
