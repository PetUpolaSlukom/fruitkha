@extends('layout')

@section('content')

    <div class="col-12" style="height: 100px; background-color: #051922">

    </div>
    <div class="col-12 pl-0 d-flex justify-content-around flex-wrap my-5 mx-5">
        <form name="login-form" id="login-form" class="col-8 col-md-6 pt-5 pb-3 bg-light mx-auto" method="POST" action="{{route('doLogin')}}">
            @csrf
                @if(session('message') != null)
                    <p class="col-12 alert alert-success">{{session("message")}}</p>
                @endif
                @if(session('middlewareError') != null)
                    <p class="col-12 alert alert-warning">{{session("middlewareError")}}</p>
                @endif
            <h2 class="col-12 mb-5 text-center">Sign in</h2>
            <div class="container-fluid col-12">
                <div>
                    <input type="email" name="email" id="email" class="container border-bottom-green  py-3" placeholder="Email" value="{{old('email')}}">
                </div>
                <div>
                    <input type="password" name="password" id="password" class="container border-bottom-green py-3 mt-2" placeholder="Password">
                </div>
                @if($errors->any())
                    <ul class="mt-3 text-sm text-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                @if(session('error') != null)
                    <p class="text-danger mt-3 text-sm">{{session("error")}}</p>
                @endif
                <div class="d-flex align-items-center flex-column py-3">
                    <input type="submit" id="login-button" name="login-button" class="btn btn-dark" value="Sign in">
                </div>
            </div>
            <p class='text-center text-muted py-3'>New to fruitkha?<a href="{{route('register')}}" class='ml-2 orange-text transpBgHover td-u'>Create an account.</a></p>

        </form>
    </div>
@endsection
