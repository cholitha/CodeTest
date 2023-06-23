<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index(){
        $mailData=[
            'title'=>'Title',
            'body'=>'Body'
        ];
        Mail::to('cholitha.sandaruwan@gmail.com')->send(new MailNotify($mailData));

        dd('sent');
    }
}
