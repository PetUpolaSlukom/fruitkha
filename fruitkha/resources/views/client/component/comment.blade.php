<div class="single-comment-body child">
    <div class="comment-user-avater">
        <img src="{{asset('assets/img/User_Icon.png')}}" style="width: 30px;" alt="User">
    </div>
    <div class="comment-text-body">
        <h4>{{$comm->first_name ." ". $comm->last_name}}
            <span class="comment-date">{{date("F j, Y, g:i a", $comm->created_at)}}</span>
        </h4>
        <p class="mb-3">{{$comm->text}}</p>
        @if(session()->has('user'))
            @if(session()->get('user')->admin)
                <form action="{{route('comment.destroy', ['comment'=>$comm->id_comment])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="hidden_comment_id" value="{{$comm->id_comment}}">
                    <input type="submit" class="btn btn-outline-danger" value="Delete comment"/>
                </form>
            @endif
        @endif
        @if(session()->has('user'))
            @if(session()->get('user')->id_user == $comm->id_user)
                <form action="{{route('comment.destroy', ['comment'=>$comm->id_comment])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="hidden_comment_id" value="{{$comm->id_comment}}">
                    <input type="submit" class="btn-danger" value="Delete comment"/>
                </form>
            @endif
        @endif
    </div>
</div>
