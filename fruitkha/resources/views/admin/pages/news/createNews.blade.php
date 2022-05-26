@extends('admin_layout')

@section('content')

    <div class="d-flex flex-wrap justify-content-around col-9">
        <div class="col-12 grid-margin stretch-card ml-5">
            <div class="card">
                <div class="card-body">
                    <p class="review-status-message"></p>
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">News</h4><br>
                        <p class="text-muted mb-1 small">Checked News will show on News page</p>
                    </div>
                    <div id="admin-news" class="preview-list">
                        @if($errors->any())
                            <ul class="mt-3 text-sm text-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(session('newsError') != null)
                            <p class="text-danger mt-3 text-sm">{{session("newsError")}}</p>
                        @endif
                        @if(session('newsMessage') != null)
                            <p class="text-success mt-3 text-sm">{{session("newsMessage")}}</p>
                        @endif
                        <p class="news-status-message"></p>
                        <form class="forms-sample" action="{{route('storeNews')}}" method="POST">
                            @csrf
                            <p class="text-light">Author : <code>{{session('user')->first_name . " " . session('user')->last_name}}</code></p>
                            <p class="text-light">Created at: <code>{{date("d F, Y",time())}}</code></p>
                            <div class="form-group">
                                <label for="review_text">[Title]</label>
                                <textarea class="form-control" name="news_title" maxlength="100" rows="3">

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="review_text">[Short description]</label>
                                <textarea class="form-control" name="news_short_description" maxlength="255" rows="4">

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="review_text">[Text]</label>
                                <textarea class="form-control" name="news_text" maxlength="10000" rows="20">

                                </textarea>
                            </div>
                            <input type="submit" class="btn btn-inverse-success btn-lg" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
