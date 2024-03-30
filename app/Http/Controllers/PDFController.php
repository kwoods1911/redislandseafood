<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Quote;
use PDF;

class PDFController extends Controller
{
    public function generateQuotePDF(Request $request)
    {
        $data = $request->query();
        // Query the model and pass data to PDF.
        $quote = Quote::find($data['id']);
        $information = $quote->toArray();
        $pdf = PDF::loadView('pages.quotePDF',$information);
        return $pdf->download('quote.pdf');
    }
}
