@extends('layout')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg" style="background-image: url('{{ asset('assets/img/breadcrumab-bg.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Organic Information</p>
                        <h1>News Article</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->


    <!-- latest news -->
    <div class="latest-news mt-150 mb-150">
        <div class="container">
            <div class="col-12 d-flex justify-content-center mb-5">
                <form class="form-inline col-12" name="searchNews-form" id="searchNews-form" action="{{route('news')}}" method="GET">
{{--                    @csrf--}}
                    <input class="form-control form-control-lg mr-sm-2" id="keywordsNews" name="keywordsNews" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <p class="card-description col-12" id="searchNews-error"></p>
            <div class="row" id="news-div">
                @foreach($news as $i)
                    @component("client.component.news", [
                            "news" => $i
                    ])@endcomponent
                @endforeach
            </div>

            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a class="active" href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
