@extends('admin_layout')

@section('content')

<div class="d-flex flex-wrap justify-content-around">
    <div id="admin-news-search" class="col-12 d-flex justify-content-center">
        <form class="form-inline col-12" style="height: 300px;" name="searchNews-form" id="searchNews-form" action="" method="GET">
            {{--                    @csrf--}}
            <input class="form-control form-control-lg mr-sm-2" id="keywordsNews" name="keywordsNews" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-lg btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>


    <div id="admin-news-add" class="col-12 d-flex justify-content-center">
        <a href="{{route('createNews')}}" class="btn btn-lg btn-primary">Create news</a>
    </div>


    <div class="col-12 grid-margin stretch-card ml-5">
            <div class="card">
                <div class="card-body">
                    <p class="review-status-message"></p>
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">News</h4><br>
                        <p class="text-muted mb-1 small">Checked News will show on News page</p>
                    </div>
                    <div id="admin-news" class="preview-list">
                        @if(session('registerError') != null)
                            <p class="text-danger mt-3 text-sm">{{session("registerError")}}</p>
                        @endif
                        @if(session('registerMessage') != null)
                            <p class="text-success mt-3 text-sm">{{session("registerMessage")}}</p>
                        @endif
                        <p class="news-status-message"></p>
                        @foreach($news as $n)
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail col-5 col-sm-4 col-md-3">
                                    <img src="{{asset('assets/img/' . $n->img_path)}}" alt="image" class="img-fluid" style="width: 100%; height: 100%">
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h3 class="preview-subject">{{$n->title}}</h3>
                                            <p class="text-muted text-small">{{$n->created_at}}</p>
                                        </div>
                                        <p class="text-muted mt-3">{{$n->short_description}}</p>
                                        <p class="text-muted mt-5">{{$n->first_name . " " . $n->last_name}}</p>

                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="newsStatus" value="{{$n->id_news}}" class="form-check-input" @if($n->active) checked @else  @endif />
                                                Active
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-success">
                                            <a class="btn btn-inverse-warning" href="{{route('editNews', ['news'=>$n->id_news])}}" value="{{$n->id_news}}">Edit</a>
                                            <a class="btn btn-inverse-danger" value="{{$n->id_news}}">Delete</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection
