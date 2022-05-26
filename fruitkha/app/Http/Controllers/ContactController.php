<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('client.contact');
    }

    public function sendMessage(){
        //        MAIL_MAILER=smtp
        //        MAIL_HOST=mailhog
        //        MAIL_PORT=1025
        //        MAIL_USERNAME=null
        //        MAIL_PASSWORD=null
        //        MAIL_ENCRYPTION=null
        //        MAIL_FROM_ADDRESS=null
        //        MAIL_FROM_NAME="${APP_NAME}"
        $data = request()->validate([
           'name' => 'required|min:2|max:20',
           'email' => 'required|email',
           'text' => 'required|min:10|max:100',
        ]);

        Mail::to('djordjeminic2000@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('message', 'Message is successifuly send.');

    }
}
