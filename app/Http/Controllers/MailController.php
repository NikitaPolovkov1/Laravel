<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function send()
    {
        Mail::send([], [], function ($message) {
            $message->to('pravaderi@gmail.com', 'Activitar')->subject('test email');
            $message->from('nikitapolovkov1@gmail.com', 'Activitar');
            $message->text('This is a test email content');
        });
//        Mail::send(['text' => 'mail'] ,['name', 'webdevblog'], function ($message){
//            $message->to('pravaderi@gmail.com', 'To web blog')->subject('test email');
//            $message->from('nikitapolovkov1@gmail.com', 'web blog');
//
//        });
    }
}
