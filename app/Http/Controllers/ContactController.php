<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

use App\Mail\SendMail;
use App\Mail\SendMessageToEndUser;
use Mail;


class ContactController extends Controller
{
    public function store(Request $request){
        // perform validation ?
        $contacts = new Contacts;
        $contacts->customer_name = $request->contact_name;
        $contacts->customer_email = $request->contact_email;
        $contacts->customer_message = $request->contact_message;

        if($request->contact_email !== $request->contact_email_confirmation){
            return redirect()->route('contact')->with('error', 'The emails do not match .');
        }


        //Send mail to user.
        //If mail successfully sent then.

        $name = $request->contact_name;
        $email = $request->contact_email;
        $message = $request->contact_message;


        $mailData = [
            'url' => 'https://sandroft.com/'
        ];

        //First send customer email to yourself.
        $send_mail = "redislandseafood@gmail.com";
        Mail::to($send_mail)->send(new SendMail($name,$email,$message));

        // then send an automated reply.
        $senderMessage = "Thanks for your message we will reply within 24 hours.";
        $test = Mail::to($email)->send(new SendMessageToEndUser($name,$senderMessage,$mailData));
        
        $contacts->save();
        
        return redirect()->route('contact')->with('success', 'You message was successfully sent !');
    }
}
