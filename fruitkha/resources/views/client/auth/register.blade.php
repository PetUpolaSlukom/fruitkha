@extends('layout')

@section('content')

    <div class="col-12" style="height: 100px; background-color: #051922">

    </div>
    <div class="col-12 pl-0 d-flex justify-content-around my-5">
        <form name="register-form" id="register-form" class="col-8 col-md-6  pt-5 pb-3 bg-light" method="POST" action="{{route('doRegister')}}">
            @csrf
            <h2 class="col-12 mb-5 text-center">Sing up</h2>
            <div class="container-fluid col-12">
                <p class='text-danger'><small>*All fields are required.</small></p>
                <div>
                    <input type="text" name="firstName" id="firstName" class="container border-bottom-green  py-3" placeholder="First name">
                </div>
                <div>
                    <input type="text" name="lastName" id="lastName" class="container border-bottom-green  py-3 mt-2" placeholder="Last name">
                </div>
                <div>
                    <input type="email" name="email" id="email" class="container border-bottom-green  py-3 mt-2" placeholder="Email">
                </div>
                <div>
                    <input type="password" name="password" id="password" class="container border-bottom-green py-3 mt-2" placeholder="Password">
                </div>
                <div>
                    <input type="password" name="confirm-password" id="confirm-password" class="container border-bottom-green py-3 mt-2" placeholder="Confirm password">
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
                    <input type="submit" name="register-button" id="register-button" class="btn btn-dark" value="Sing up">
                </div>
            </div>
            <p class='text-center text-muted'>Already have an account?<a href="{{route('login')}}" class='ml-2 text-danger transpBgHover td-u'>Sing in.</a></p>
        </form>
    </div>
@endsection
