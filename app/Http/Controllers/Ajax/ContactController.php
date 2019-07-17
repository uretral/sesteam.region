<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {

        $result = false;

        if($request->ajax() && !empty($request->all()))
        {
            $sender = $request;

            Mail::send('email.callback', ['sender' => $sender], function($message) use ($sender) {
                $message->from(env('MAIL_ADMIN_EMAIL'), $sender->name);
                $message->to(env('MAIL_ADMIN_EMAIL'));
                $message->subject('форма обратной связи');
            });

            $result = true;
        }

        return response()->json(['result' => $result]);
    }
}
