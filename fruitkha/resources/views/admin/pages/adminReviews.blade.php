@extends('admin_layout')

@section('content')

    <div class="d-flex flex-wrap justify-content-around">
        <div class="col-12 col-lg-5 grid-margin stretch-card mt-5 ml-5">
            <div class="card mt-5 ">
                <div class="card-body">
                    <p class="review-status-message"></p>
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">Reviews</h4><br>
                        <p class="text-muted mb-1 small">Checked reviews will show on Home page</p>
                    </div>
                    <div class="preview-list">
                        @if(session('registerError') != null)
                            <p class="text-danger mt-3 text-sm">{{session("registerError")}}</p>
                        @endif
                        @if(session('registerMessage') != null)
                            <p class="text-success mt-3 text-sm">{{session("registerMessage")}}</p>
                        @endif
                        @foreach($reviews as $r)
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <img src="{{asset('assets/img/avaters/' . $r->image)}}" alt="image" class="rounded-circle">
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h6 class="preview-subject">{{$r->full_name}}</h6>
                                            <p class="text-muted text-small">{{date("F j, Y, g:i a", $r->created_at)}}</p>
                                        </div>
                                        <p class="text-muted">{{$r->text}}</p>
                                    </div>

                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                                <input type="checkbox" name="reviewStatus" value="{{$r->id_review}}" class="form-check-input" @if($r->active) checked @else  @endif />
                                                Active
                                                <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 grid-margin stretch-card mt-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Add new review</h4>
                    @if($errors->any())
                        <ul class="mt-3 text-sm text-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form class="forms-sample" action="{{route('storeReview')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Full name</label>
                            <input type="text" class="form-control" name="full_name" placeholder="Full name">
                        </div>
                        <div class="form-group">
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control" name="profession" placeholder="Profession">
                        </div>
                        <div class="form-group">
                            <label for="review_text">Review</label>
                            <textarea class="form-control" name="review_text" maxlength="200" rows="4">

                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-dark">Reset</button>
                    </form>
                    @if(session('reviewError') != null)
                        <p class="text-danger mt-3 text-sm">{{session("reviewError")}}</p>
                    @endif
                    @if(session('reviewMessage') != null)
                        <p class="text-success mt-3 text-sm">{{session("reviewMessage")}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
