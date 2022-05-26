<div class="col-lg-4 col-md-6">
    <div class="single-latest-news">
{{--        <a href="single-news.html"><div class="latest-news-bg news-bg-1"></div></a>--}}

        <a href="{{ route("single-news", ["news"=>$news->id_news]) }}">

            <img src="{{asset('assets/img/'. $news->img_path)}}" alt="{{$news->title}}">
        </a>
        <div class="news-text-box">
            <h3><a href="{{ route("single-news", ["news"=>$news->id_news]) }}">{{$news->title}}</a></h3>
            <p class="blog-meta">
                <span class="author"><i class="fas fa-user"></i> {{$news->first_name}}</span>
                <span class="date"><i class="fas fa-calendar"></i> {{$news->created_at}}</span>
            </p>
            <p class="excerpt">{{$news->short_description}}</p>
            <div class="col-12 d-flex justify-content-between">
                <a href="{{ route("single-news", ["news"=>$news->id_news]) }}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                @if(session()->has('user'))
                    @if(session()->get('user')->admin)
                        <a href="{{ route("single-news", ["news"=>$news->id_news]) }}" class="read-more-btn text-danger">edit <i class="fas fa-angle-right"></i></a>
                    @endif
                @endif

            </div>
        </div>
    </div>
</div>
