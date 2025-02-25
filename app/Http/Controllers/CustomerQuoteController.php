<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class CustomerQuoteController extends Controller
{
    public function view(){
        // Select All quotes from the authenticated user.
        $quotes = Quote::where('user_id', auth()->user()->id)->get();
        // dd($quotes, auth()->user()->id);
        return view('pages.quotes.view-quote')->with('quotes', $quotes);
    }
}
