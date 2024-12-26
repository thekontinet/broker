<?php

namespace App\Http\Controllers;

use App\Mail\AdminMessage;
use Illuminate\Http\Request;
use Mail;

class SendEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:1000']
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new AdminMessage($request->input('message') . "\n\n" . "Sender: " . $request->input('email')));

        return back()->with(['success' => 'Message sent']);
    }
}
