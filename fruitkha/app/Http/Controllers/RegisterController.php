<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\UserModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('client.auth.register');
    }

    public function doRegister(StoreUserRequest $request){

        $fn = $request->input('firstName');
        $ln = $request->input('lastName');
        $email = $request->input('email');
        $password = $request->input('password');

        $userModel = new UserModel();

        $result = $userModel->StoreUser($fn, $ln, $email, $password);

        if ($result){
            return redirect()->route("login")->with('message', 'Successfuly created account! Now you can sing in.');
        }
        return redirect()->back()->with("error", "Something get wrong, try later.");
    }
}
