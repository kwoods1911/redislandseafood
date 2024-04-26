<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quote;

class AdminController extends Controller
{
    public function index(){
        $quote = Quote::all();
        return view('admin.quote-admin')->with('quote',$quote);
    }


    public function view($id){
        $quote = Quote::find($id);
        return view('admin.quote-details')->with('quote',$quote);
    }

    public function delete($id){
        $record = Quote::find($id);
        $record->delete();
        return redirect()->route('admin');
    }
}
