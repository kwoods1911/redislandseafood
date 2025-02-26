<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class CustomerQuoteController extends Controller
{
    public function listQuotes(){
        // Select All quotes from the authenticated user.
        $quotes = Quote::where('user_id', auth()->user()->id)->get();

        //get customer information
        return view('pages.quotes.list-quotes')->with('quotes', $quotes);
    }


    public function viewQuote($id,Quote $quote){

        $quote = Quote::find($id);
        if($quote->user_id == auth()->user()->id){
            return view('pages.quotes.view-quote')->with('quote', $quote);
        }else{
            // display error message to user.
            return view('pages.unauthorized-page');
        }
                

    }
}
