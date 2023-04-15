<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function sendEmail()
    {
        $data = [
            'subject' => 'Test Subject',
            'body' => 'This is a test context'
        ];

        $user = Auth::user();

        Mail::to($user->email)->send(new WelcomeMessage($data));

        return 1;
    }
}
