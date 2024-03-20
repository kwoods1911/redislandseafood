<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{

    $LOB_PRICE_PER_POUND = null;
    $SHRIMP_PRICE_PER_POUND = 15.5;
    $CLAM_PRICE_PER_POUND = 15.5;

// Live Lobster Pounds
// Price: $20.00 per pound
// Order Quantity: 20 - 50 pounds
// Price: $15.50 per pound
// Order Quantity: 51 - 299 pounds
// Price: $14.50 per pound
// Order Quantity: 300 - 499 pounds
// Price: $13.50 per pound
// Order Quantity: 500 - 999 pounds
// Price: $12.50 per pound
// Order Quantity: 1000 + pounds


// Cooked Lobster Pounds
// Cooked Lobster
// Price: $22.00 per pound
// Order Quantity: 20 - 50 pounds
// Price: $17.50 per pound
// Order Quantity: 51 - 299 pounds
// Price: $16.50 per pound
// Order Quantity: 300 - 499 pounds
// Price: $15.50 per pound
// Order Quantity: 500 - 999 pounds
// Price: $14.50 per pound
// Order Quantity: 1000 + pounds

    public function store(Request $request){

    $quote = new Quote;
    $quote->companyName = $request->company_name;
    $quote->companyEmail = $request->company_email;
    $quote->companyAddress = $request->company_address;
    $quote->companyPhoneNumber = $request->company_phone;
    $quote->province = $request->company_province;
    $quote->postalCode = $request->company_postal_code;


    $quote->minLobsterSizes = $request->min_lobster_size;
    $quote->maxLobsterSizes = $request->max_lobster_size;
    $quote->totalLiveLobsterPounds = $request->totalLiveLobsterPounds;
    $quote->totalFrozenLobsterPounds = $request->total_frozen_lobster_pounds;
    $quote->clamMeatPounds = $request->total_clam_pounds;
    $quote->shrimpMeat = $request->total_shrimp_pounds;

    $quote->save();
    }



    public function calculatePrice($totalLobsterPounds){

    }


    public function determineLiveLobsterUnitPrice($totalLobsterPounds){

        if($totalLobsterPounds === 0) return 0;
        
        if($totalLobsterPounds >= 20 && $totalLobsterPounds <= 50) return 20.00;

        if($totalLobsterPounds >= 51 && $totalLobsterPounds <= 299) return 15.50;

        if($totalLobsterPounds >= 300 && $totalLobsterPounds <= 499) return 14.50;

        if($totalLobsterPounds >= 500 && $totalLobsterPounds <= 999) return 13.50;

        if($totalLobsterPounds >= 100) return 12.50;
    }

}
