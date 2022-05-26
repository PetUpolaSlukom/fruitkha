<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        return view('test');
    }

    public function doTest(Request $request){
        $request->validate([
            'email' => 'bail|required|max:64|min:3',
            'password' => 'bail|required|max:20|min:8'
        ]);
    }

    public function proba(Request $request){
        return view('proba');
    }
}
