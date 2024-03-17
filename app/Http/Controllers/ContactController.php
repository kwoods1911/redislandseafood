<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;


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
        }else {
            $contacts->save();
            return redirect()->route('contact')->with('success', 'You message was successfully sent !');
        }
        

       


       


    }
}
