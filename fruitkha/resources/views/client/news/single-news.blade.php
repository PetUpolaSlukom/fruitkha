@extends('layout')

@section('content')


    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg"  style="background-image: url('{{ asset('assets/img/breadcrumab-bg.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Read the Details</p>
                        <h1>Single Article</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single article section -->

    <div class="mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-article-section">
                        <div class="single-article-text">
                            <div class="single-artcile-bg">
                                <img src="{{asset('assets/img/'. $news->img_path)}}" alt="{{$news->title}}">
                            </div>
                            <p class="blog-meta mb-3">
                                <span>
                                    <i class="fa fa-glasses"></i>
                                    @if($reading_time < 1)
                                        < 1 min
                                    @else
                                        {{ceil($reading_time)}} min
                                    @endif
                                </span>
                                <span class="author"><i class="fas fa-user"></i> {{$news->first_name . " " . $news->last_name}}</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{$news->created_at}}</span>
                            </p>
                            {{$news->text}}
                        </div>

                        <div class="comments-list-wrap">
                            <h3 class="comment-count-title">
                                {{count($comments)}} Comments
                            </h3>
                            <div class="comment-list">
                                @foreach($comments as $c)
                                    @if($c->id_reply == null)
                                    <div class="single-comment-body">
                                        <div class="comment-user-avater">
                                            <img src="{{asset('assets/img/User_Icon.png')}}" style="width: 30px;" alt="User">
                                        </div>
                                        <div class="comment-text-body">
                                            <h4>{{$c->first_name ." ". $c->last_name}}
                                                <span class="comment-date mr-3">
                                                    {{date("F j, Y, g:i a", $c->created_at)}}
                                                </span>
                                                @if(session()->has('user'))
                                                    @if(!session()->get('user')->admin)
                                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#replyModal" data-hidden="{{$c->id_comment}}" data-comment="{{$c->text}}" data-user="{{$c->first_name}}">reply</button>
                                                    @endif
                                                @endif
                                            </h4>
                                            <p class="mb-3">{{ $c->text }}</p>
{{--                                            user delete--}}
                                            @if(session()->has('user'))
                                                @if(session()->get('user')->id_user == $c->id_user)
                                                    <form action="{{route('comment.destroy', ['comment'=>$c->id_comment])}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="hidden_comment_id" value="{{$c->id_comment}}">
                                                        <input type="submit" class="btn-danger" value="Delete comment"/>
                                                    </form>
                                                @endif
                                            @endif
{{--                                            admin delete--}}
                                            @if(session()->has('user'))
                                                @if(session()->get('user')->admin)
                                                    <form action="{{route('comment.destroy', ['comment'=>$c->id_comment])}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="hidden_comment_id" value="{{$c->id_comment}}">
                                                        <input type="submit" class="btn btn-outline-danger" value="Delete comment"/>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                        {{--  ISPIS PODKOMENTARA --}}
                                    @foreach($comments as $r)
                                        @if($r->id_reply == $c->id_comment)
                                            @component("client.component.comment", [
                                                    "comm" => $r,
                                                    "comments" => $comments
                                            ])@endcomponent
                                        @endif
                                    @endforeach
                                        {{--  KRAJ --}}
                                    </div>
                                @endforeach
                            </div>
                            @if(session()->has('delete-message'))
                                <p class="text-primary">{{session()->get('delete-message')}}</p>
                            @endif

                            {{--                        MODAL REPLY--}}
                            <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="replyModalLabel">Reply to</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="reply-comment-form" action="{{route('comment.store')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label font-weight-bolder">Comment:</label>
                                                    <p class="replyToThis"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reply-comment-comment" class="col-form-label font-weight-bolder">Reply:</label>
                                                    <textarea maxlength="150" class="form-control" name="reply-comment-comment" id="reply-comment-comment"></textarea>
                                                </div>
                                                <p id="reply-comment-error" class="text-danger"></p>
                                                <div class="form-group">
                                                    <input type="hidden" name="reply-comment-hidden" id="reply-comment-hidden" value="" class="hidden-input">
                                                    <input type="hidden" name="reply-comment-news" id="reply-comment-news" value="{{$news->id_news}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" value="Post comment">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                     END   MODAL REPLY--}}
                        </div>


                        <div class="comment-template">
                            @if(session()->has('user'))
                                @if(session()->get('user')->admin)
{{--                                    <a href="" class="read-more-btn text-danger">Menage comment section <i class="fas fa-angle-right"></i></a>--}}
                                @else
                                    <h4>Leave a comment</h4>
                                    <p>If you have a comment dont feel hesitate to send us your opinion.</p>
                                    <form id="post-comment-form" action="{{route('comment.store')}}" method="POST">
                                        @csrf
                                            <p class="font-weight-bold">Write a comment</p>
{{--                                        <p>{{session()->get('user')->first_name ." ". session()->get('user')->last_name}}</p>--}}
{{--                                        <p>--}}
{{--                                            <input type="text" name="name" placeholder="Your Name">--}}
{{--                                            <input type="email" name="email" placeholder="Your Email">--}}
{{--                                        </p>--}}
                                        <p><textarea name="post-comment-comment" id="post-comment-comment" cols="30" rows="10" placeholder="Your Comment"></textarea></p>
                                        <p id="post-comment-error" class="text-danger"></p>
                                        <input type="hidden" name="post-comment-news" id="post-comment-news" value="{{$news->id_news}}">
                                        <p><input type="submit" value="Submit"></p>
                                    </form>
                                @endif
                            @else
                                <h4>Leave a comment</h4>
                                <p>If you want to write comment, you must be logged in. <br><a href="{{route('login')}}" class='ml-2 btn btn-dark text-light'>Sing in.</a></p>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-section">
                        <div class="recent-posts">
                            <h4>Recent Posts</h4>
                            <ul>
                                <li><a href="single-news.html">You will vainly look for fruit on it in autumn.</a></li>
                                <li><a href="single-news.html">A man's worth has its season, like tomato.</a></li>
                                <li><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></li>
                                <li><a href="single-news.html">Fall in love with the fresh orange</a></li>
                                <li><a href="single-news.html">Why the berries always look delecious</a></li>
                            </ul>
                        </div>
                        <div class="archive-posts">
                            <h4>Archive Posts</h4>
                            <ul>
                                <li><a href="single-news.html">JAN 2019 (5)</a></li>
                                <li><a href="single-news.html">FEB 2019 (3)</a></li>
                                <li><a href="single-news.html">MAY 2019 (4)</a></li>
                                <li><a href="single-news.html">SEP 2019 (4)</a></li>
                                <li><a href="single-news.html">DEC 2019 (3)</a></li>
                            </ul>
                        </div>
                        @if(count($tags))
                        <div class="tag-section">
                            <h4>Tags</h4>
                            <ul>
                                @foreach($tags as $tag)
                                <li>{{$tag->name}}</li>
                                {{-- <li><a href="">{{$tag->name}}</a></li>--}}
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single article section -->
@endsection
