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


    public function view($id){
        // this view is responsible for displaying the
        //retrieve quote and send it to page.
        $quote = Quote::find($id);
        

        return view('admin.quote-details')->with('quote',$quote);
    }

    public function delete(){

    }
}
