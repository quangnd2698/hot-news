<div class="row">
    <div class="col-lg-12">
        <div class="trending-tittle">
            <strong>Tin hot</strong>
            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            <div class="trending-animated">
                <ul id="js-news" class="js-hidden">
                    @if (!empty($trendings))
                    @foreach ($trendings as $item)
                        <li class="news-item">{{$item->title}}</li>
                    @endforeach
                    @endif
                </ul>
            </div>

        </div>
    </div>
</div>