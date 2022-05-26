@extends('layout')

@section('content')

    <div class="col-12" style="height: 100px; background-color: #051922">

    </div>
    <div class="d-flex justify-content-around flex-wrap py-5 m-0 col-12">
        <div id="contact-info" class="col-10 col-md-5 p-5 bg-light d-flex flex-wrap mb-5">
            <h2 class="col-12 mb-4 text-dark border-bottom pb-5">Contact info</h2>
            <div class="col-12">
                <ul id="contact-info-list" class="p-0">
                    <li class="py-3 d-flex align-items-center">
                        <span class="mr-4 fas fa-map-marked-alt text-muted"></span><p class="text-dark mb-0">Cara Dusana 16, Beograd</p>
                    </li>
                    <li class="py-3 d-flex align-items-center">
                        <span class="mr-4 fas fa-map-marked-alt text-muted"></span><p class="text-dark mb-0">Milana Rakica 77, Beograd</p>
                    </li>
                    <li class="py-3 d-flex align-items-center">
                        <span class="mr-4 far fa-clock text-muted"></span><p class="text-dark mb-0">Mon-Fri : 10:00am-09:00pm</p>
                    </li>
                    <li class="py-3 d-flex align-items-center">
                        <span class="fas fa-phone mr-3 text-muted"></span><a class="text-muted td-u" href="tel:+381694301312">+381 69 420 1312</a>
                    </li>
                    <li class="py-3 d-flex align-items-center">
                        <span class="fas fa-envelope mr-3 text-muted"></span><a class="text-muted td-u" href="mailto:djordjeminic2000@gmail.com">fruitkha.centar@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
        <form name="contact-form" id="contact-form" class="col-10 col-md-5 p-5 pb-0" method="POST" action="{{route('sendMessage')}}">
            @csrf
            <h2 class="col-12 mb-4 text-dark border-bottom pb-5">Send message</h2>
            <div class="container-fluid col-12">
                <div>
                    <input type="text" name="name" id="name" class="container border-bottom-green py-2" placeholder="Full name"
                           @if(session()->has('user'))
                           value="{{session()->get('user')->first_name ." ". session()->get('user')->last_name}}"
                        @endif
                    >
                </div>
                <div>
                    <input type="email" name="email" id="email" class="container border-bottom-green py-2 mt-2" placeholder="Email"
                        @if(session()->has('user'))
                            value="{{session()->get('user')->email}}"
                        @endif
                    >
                </div>
                <div>
                    <textarea name="text" id="text" cols="22" maxlength="200" rows="4" class="container border-bottom-green py-2 mt-2" placeholder="Message text.."></textarea>
                </div>
                <div class="d-flex align-items-center flex-column py-3">
                    <input type="submit" id="contact-button" name="contact-button" class="btn btn-light" value="Send">
                </div>
            </div>

            @if(session('message') != null)
                <p class="alert alert-success mt-3 text-sm">{{session("message")}}</p>
            @endif
        </form>
    </div>
@endsection
