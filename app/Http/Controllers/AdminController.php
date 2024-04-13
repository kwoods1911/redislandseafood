<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quote;

class AdminController extends Controller
{
    public function index(){
        $quote = Quote::all();
        return view('pages.quote-admin')->with('quote',$quote);
    }


    public function view(){

    }

    public function delete(){

    }
}
