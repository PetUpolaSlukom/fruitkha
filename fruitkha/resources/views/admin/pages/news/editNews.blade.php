@extends('admin_layout')

@section('content')
    <div class="d-flex justify-content-center flex-wrap col-12 mt-5">
    <div class="col-md-7 grid-margin stretch-card mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit news</h4>
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
                <form class="forms-sample" action="{{route('updateNews', ['id'=>$n->id_news])}}" method="POST">
                    @csrf
                    <p class="text-light">Author : <code>{{$n->first_name . " " . $n->last_name}}</code></p>
                    <p class="text-light">Created at: <code>{{$n->created_at}}</code></p>
                    @if($n->updated_at != null)
                        <p class="text-light">Last update : <code>{{date("d F, Y",$n->updated_at)}}</code></p>
                    @endif
                    <div class="form-group">
                        <label for="review_text">[Title]</label>
                        <textarea class="form-control" name="news_title" maxlength="200" rows="3">
                            {{$n->title}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="review_text">[Short description]</label>
                        <textarea class="form-control" name="news_short_description" maxlength="200" rows="4">
                            {{$n->short_description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="review_text">[Text]</label>
                        <textarea class="form-control" name="news_text" maxlength="200" rows="20">
                            {{$n->text}}
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-inverse-success btn-lg" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
