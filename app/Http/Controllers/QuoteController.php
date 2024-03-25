<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Quote;
use Illuminate\Support\Facades\Validator;

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

    //Apply form validation
    //conditions for failer ?
    // if all pounds are empty ?
    // if user doesnt enter company name, email, phone number address, city, province, postal code.
    // if the min value  greater than the max value.
    // min order quantity is 20 pounds for all items.
 
    $validator = Validator::make($request->all(), [
        'company_name' => 'required|max:255',
        'company_email' => 'required',
        'company_address' => 'required',
        'company_city' => 'required',
        'company_province' => 'required',
        'company_postal_code' => 'required',
        'min_lobster_size' => 'required',
        'max_lobster_size' => 'required|gte:min_lobster_size',
        'total_live_lobster_pounds' => 'gt:0|max:3000',
        'total_frozen_lobster_pounds' => 'gt:0|max:3000',
        'total_clam_pounds' => 'gt:0|max:3000',
        'total_shrimp_pounds' => 'gt:0|max:3000'

    ]);
    
    if ($validator->fails()) {
        return redirect('/quote')
                    ->withErrors($validator)
                    ->withInput();
    }
    
    if($request->total_live_lobster_pounds > 0 && $request->total_live_lobster_pounds < 20)
            return redirect()->route('quote')->with('error', 'Minimum amount of live lobsters is 20 pounds.');

    if($request->total_frozen_lobster_pounds > 0 && $request->total_frozen_lobster_pounds < 20)
        return redirect()->route('quote')->with('error', 'Minimum amount of cooked lobsters is 20 pounds.');

    if($request->total_clam_pounds > 0 && $request->total_clam_pounds < 20)
        return redirect()->route('quote')->with('error', 'Minimum amount of calms is 20 pounds.');    

    if($request->total_shrimp_pounds > 0 && $request->total_shrimp_pounds < 20)
        return redirect()->route('quote')->with('error', 'Minimum amount of shrimp is 20 pounds.');     

    $quote = new Quote;
    $quote->companyName = $request->company_name;
    $quote->companyEmail = $request->company_email;
    $quote->companyAddress = $request->company_address;
    $quote->companyCity = $request->company_city;
    $quote->companyPhoneNumber = $request->company_phone;
    $quote->province = $request->company_province;
    $quote->postalCode = $request->company_postal_code;


    $quote->minLobsterSizes = $request->min_lobster_size;
    $quote->maxLobsterSizes = $request->max_lobster_size;
    $quote->totalLiveLobsterPounds = $request->total_live_lobster_pounds;
    $quote->totalFrozenLobsterPounds = $request->total_frozen_lobster_pounds;
    $quote->clamMeatPounds = $request->total_clam_pounds;
    $quote->shrimpMeatPounds = $request->total_shrimp_pounds;

    $quote->totalCostOfLiveLobster = $this->calculatePrice($this->determineLiveLobsterUnitPrice($request->total_live_lobster_pounds),$request->total_live_lobster_pounds);    
    $quote->totalCostOfFrozenLobster = $this->calculatePrice($this->determineFrozenLobsterUnitPrice($request->total_frozen_lobster_pounds),$request->total_frozen_lobster_pounds);
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
