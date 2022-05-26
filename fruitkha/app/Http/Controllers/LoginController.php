<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        return view('client.auth.login');
    }

    public function doLogin(Request $request){

        $request->validate([
            'email' => 'bail|required|max:64|min:3',
            'password' => 'bail|required|max:20|min:8'
        ]);

        $userModel = new UserModel();
        $user = $userModel->GetUser($request);

        $email = $request->old('email');
        if(is_null($user)) {
            return redirect()->back()->with("error", "Wrong username or password.");
        }

        $request->session()->put("user", $user);
        return redirect()->route("home");
    }

    public function doLogout(Request $request){
        $request->session()->remove("user");
        return redirect()->route("home");
    }
}
