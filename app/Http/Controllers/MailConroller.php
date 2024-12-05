<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailConroller extends Controller
{
    public function contact(Request $request)
    {
        // Nalidate the request $data


        $mailData = [
            'title'=>'Message de Client',
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'mail'=>$request->input('mail'),
            'message'=>$request->input('message'),

        ];


        // Send the email
        Mail::to('mouadom2003@gmail.com')->send(new MyEmail($mailData));
        return back()->with('success', 'Message envoyé avec success');

    }
}
