<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{

    // $LOB_PRICE_PER_POUND = null;
    // $SHRIMP_PRICE_PER_POUND = 15.5;
    // $CLAM_PRICE_PER_POUND = 15.5;

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

//clam meat 10.50

//shrimp meat 9.50


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
    $quote->totalLiveLobsterPounds = $request->total_live_lobster_pounds;
    $quote->totalFrozenLobsterPounds = $request->total_frozen_lobster_pounds;
    $quote->clamMeatPounds = $request->total_clam_pounds;
    $quote->shrimpMeat = $request->total_shrimp_pounds;

    $quote->totalCostOfLiveLobster = $this->calculatePrice($this->determineLiveLobsterUnitPrice($request->total_live_lobster_pounds),$request->total_live_lobster_pounds);    
    $quote->totalCostOfFrozenLobster = $this->calculatePrice($this->determineFrozenLobsterUnitPrice($request->total_clam_pounds),$request->total_clam_pounds);
    $quote->totalCostOfClamMeat = $this->calculatePrice($this->determineClamMeatUnitPrice($request->total_clam_pounds),$request->total_clam_pounds);
    $quote->totalCostOfShrimp = $this->calculatePrice($this->determineShrimpMeatUnitPrice($request->total_shrimp_pounds),$request->total_shrimp_pounds);
    
    $quote->liveLobsterUnitPrice = $this->determineLiveLobsterUnitPrice($request->total_live_lobster_pounds);     
    $quote->frozenLobsterUnitPrice = $this->determineFrozenLobsterUnitPrice($request->total_frozen_lobster_pounds);
    $quote->clamMeatUnitPrice = $this->determineClamMeatUnitPrice($request->total_clam_pounds);
    $quote->shrimpMeatUnitPrice = $this->determineShrimpMeatUnitPrice($request->total_shrimp_pounds);
   
    $quote->subTotal = $this->calculateSubTotal(
        $quote->totalCostOfLiveLobster,
        $quote->totalCostOfFrozenLobster,
        $quote->totalCostOfClamMeat,
        $quote->totalCostOfShrimp,
    );

    $quote->shippingCost = 300.00;
    $quote->finalCost =  $quote->subTotal + $quote->shippingCost;

    $quote->save();


    return view('pages.quote-summary',  ['information' => $quote]);

    // redirect to page stating that the quote was sucessful submitted.
    //Send quote to customer via email
    }



    public function calculateLobsterPrice($totalLobsterPounds){
        $unitLobsterPrice = $this->determineLiveLobsterUnitPrice($totalLobsterPounds);
        return $unitLobsterPrice * $totalLobsterPounds;
    }


    public function calculatePrice($unitPrice,$pounds){
        return $unitPrice * $pounds;
    }

    public function determineLiveLobsterUnitPrice($totalLobsterPounds){
        // refactor and place in constants file.
        if($totalLobsterPounds === 0) return 0;

        if($totalLobsterPounds >= 20 && $totalLobsterPounds <= 50) return 20.00;

        if($totalLobsterPounds >= 51 && $totalLobsterPounds <= 299) return 15.50;

        if($totalLobsterPounds >= 300 && $totalLobsterPounds <= 499) return 14.50;

        if($totalLobsterPounds >= 500 && $totalLobsterPounds <= 999) return 13.50;

        if($totalLobsterPounds >= 1000) return 12.50;
    }


    private function determineFrozenLobsterUnitPrice($pounds){
        if($pounds === 0) return 0;

        if($pounds >= 20 && $pounds <= 50) return 22.00;

        if($pounds >= 51 && $pounds <= 299) return 17.50;

        if($pounds >= 300 && $pounds <= 499) return 16.50;

        if($pounds >= 500 && $pounds <= 999) return 15.50;

        if($pounds >= 1000) return 14.50;
    }

    private function determineClamMeatUnitPrice($pounds){
        if($pounds > 0) return 10.50;
    }

    private function determineShrimpMeatUnitPrice($pounds){
        if($pounds > 0) return 9.50;
    }

    private function calculateSubTotal($liveLobsterCost,$frozenLobsterCost,$shrimpCost,$clamMeatCost){
        return $liveLobsterCost + $frozenLobsterCost + $shrimpCost + $clamMeatCost;
    }

}
