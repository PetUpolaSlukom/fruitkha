@extends('admin_layout')

@section('content')
<div class="d-flex justify-content-center flex-wrap col-12">

    <div class="grid-margin stretch-card">
        <div class="card mt-5">
            <div class="card-body mt-5">
                <h4 class="card-title">Menage users</h4>
                <p class="card-description"> Admin account cannot be <code>deactivated</code> on this way.</p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> User </th>
                            <th> Full name </th>
                            <th> Email </th>
                            <th> Role </th>
                            <th> Menage </th>
                            <th> Comment </th>
                        </tr>
                        </thead>
                        <tbody id="tbody-users-admin">
                        @foreach($users as $u)
                            <tr>
                                <td class="py-1">
                                    <img src="{{asset('assets/img/avaters/' . $u->avatar)}}" alt="Avatar User image" />
                                </td>
                                <td> {{$u->first_name . " " . $u->last_name}} </td>
                                <td>
                                    {{$u->email}}
                                </td>
                                <td>{{$u->name}}</td>
                                <td>
                                    @if($u->name == 'Admin')
                                        Admin account
                                    @else
                                        <form action="{{route('changeStatus', ['user'=>$u->id_user])}}" method="POST" id="activate-user-form">
                                        @csrf
                                        @if($u->active)
                                            <button type="submit" class="btn btn-inverse-danger btn-fw" id="user-id-activate" data-id="{{$u->id_user}}">Deactivate</button>
                                        @else
                                            <button type="submit" class="btn btn-inverse-success btn-fw" data-id="{{$u->id_user}}">Activate</button>
                                        @endif
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($u->name == 'Admin')
                                        Admin account
                                    @else
                                        <form action="{{route('changeStatus', ['user'=>$u->id_user])}}" method="POST">
                                            @csrf
                                            @if($u->can_comment)
                                                <button type="submit" class="btn btn-inverse-danger btn-fw">Do not allow</button>
                                            @else
                                                <button type="submit" class="btn btn-inverse-success btn-fw">Allow</button>
                                            @endif
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(session('statusError') != null)
                        <p class="text-danger mt-3 text-sm">{{session("statusError")}}</p>
                    @endif
                    @if(session('statusMessage') != null)
                        <p class="text-success mt-3 text-sm">{{session("statusMessage")}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{--    ADD NEW ACCOUNT--}}

    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new user / writer / administrator</h4>
                <form class="forms-sample" action="{{route('storeUser')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Novak">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Djokovic">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="myuniqueemail@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="At least 1 uppercase, 1 lowercase adn one digit">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label><br>
                        <select class="bg-dark text-light custom-select" name="roleSelect" id="roleSelect">
                            <option selected>Choose..</option>
                            @foreach($roles as $r)
                            <option value="{{$r->id_role}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-inverse-success btn-fw">Submit</button>
                    <input type="reset" class="btn btn-inverse-danger btn-fw" value="Reset values">
                    @if($errors->any())
                        <ul class="mt-3 text-sm text-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if(session('registerError') != null)
                        <p class="text-danger mt-3 text-sm">{{session("registerError")}}</p>
                    @endif
                    @if(session('registerMessage') != null)
                        <p class="text-success mt-3 text-sm">{{session("registerMessage")}}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    {{--var flagsUrl = '{{ URL::asset('assets/img/avaters/') }}';--}}
    var token = csrf.create(session.secret);
</script>
@endsection
