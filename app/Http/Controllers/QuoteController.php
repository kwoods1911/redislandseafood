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

public function view(Request $request){
    
    //Apply form validation
    //conditions for failer ?
    // if all pounds are empty ?
    // if user doesnt enter company name, email, phone number address, city, province, postal code.
    // if the min value  greater than the max value.
    // min order quantity is 20 pounds for all items.
    $requestData = $request->all();
    $validator = Validator::make($requestData, [
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
    // Calculate total cost of everything
    //add neccesary information to $request array ?
    
    $additionalQuoteInformation = [
        'total_cost_of_live_lobster' => $this->calculatePrice($this->determineLiveLobsterUnitPrice($request->total_live_lobster_pounds),$request->total_live_lobster_pounds), 
        'total_cost_of_frozen_lobster' =>$this->calculatePrice($this->determineFrozenLobsterUnitPrice($request->total_frozen_lobster_pounds),$request->total_frozen_lobster_pounds),
        'total_cost_of_clam_meat' => $this->calculatePrice($this->determineClamMeatUnitPrice($request->total_clam_pounds),$request->total_clam_pounds),
        'total_cost_of_shrimp' => $this->calculatePrice($this->determineShrimpMeatUnitPrice($request->total_shrimp_pounds),$request->total_shrimp_pounds),
        
        'live_lobster_unit_price' => $this->determineLiveLobsterUnitPrice($request->total_live_lobster_pounds),
        'frozen_lobster_unit_price' =>$this->determineFrozenLobsterUnitPrice($request->total_frozen_lobster_pounds),
        'clam_meat_unit_price' =>$this->determineClamMeatUnitPrice($request->total_clam_pounds),
        'shrimp_meat_unit_price' =>$this->determineShrimpMeatUnitPrice($request->total_shrimp_pounds),
    ];
    $additionalQuoteInformation['shipping'] = 300.00;
    $additionalQuoteInformation['sub_total'] = $this->calculateSubTotal(
        $additionalQuoteInformation['total_cost_of_live_lobster'],
        $additionalQuoteInformation['total_cost_of_frozen_lobster'],
        $additionalQuoteInformation['total_cost_of_clam_meat'],
        $additionalQuoteInformation['total_cost_of_shrimp'],
    );

    $additionalQuoteInformation['final_cost'] = $this->calculateSubTotal(
        $additionalQuoteInformation['total_cost_of_live_lobster'],
        $additionalQuoteInformation['total_cost_of_frozen_lobster'],
        $additionalQuoteInformation['total_cost_of_clam_meat'],
        $additionalQuoteInformation['total_cost_of_shrimp'],
    ) + $additionalQuoteInformation['shipping'];

        
    $combinedInformation = array_merge($requestData,$additionalQuoteInformation);
    
    return view('pages.quote-summary',  ['information' => $combinedInformation]);
}

    public function store(Request $request){     

    $quote_information = json_decode($request->quote_information, true); 
    $quote = Quote::create([
        'companyName' => $quote_information['company_name'],
        'companyEmail' => $quote_information['company_email'],
        'companyAddress' => $quote_information['company_address'],
        'companyCity' => $quote_information['company_city'],
        'companyPhoneNumber' => $quote_information['company_phone'],
        'province' => $quote_information['company_province'],
        'postalCode' => $quote_information['company_postal_code'],
        'minLobsterSizes' => $quote_information['min_lobster_size'],
        'maxLobsterSizes' => $quote_information['max_lobster_size'],
        'totalLiveLobsterPounds' => $quote_information['total_live_lobster_pounds'],
        'totalFrozenLobsterPounds' => $quote_information['total_frozen_lobster_pounds'],
        'clamMeatPounds' => $quote_information['total_clam_pounds'],
        'shrimpMeatPounds' => $quote_information['total_shrimp_pounds'],
        'totalCostOfLiveLobster' => $quote_information['total_cost_of_live_lobster'],    
        'totalCostOfFrozenLobster' => $quote_information['total_cost_of_frozen_lobster'],
        'totalCostOfClamMeat' => $quote_information['total_cost_of_clam_meat'],
        'totalCostOfShrimp' => $quote_information['total_cost_of_shrimp'],
        'liveLobsterUnitPrice' => $quote_information['live_lobster_unit_price'],     
        'frozenLobsterUnitPrice' => $quote_information['frozen_lobster_unit_price'],
        'clamMeatUnitPrice' => $quote_information['clam_meat_unit_price'],
        'shrimpMeatUnitPrice' => $quote_information['shrimp_meat_unit_price'],
        'subTotal' => $quote_information['sub_total'],
        'shippingCost' => $quote_information['shipping'],
        'finalCost' => $quote_information['final_cost'],
    ]);    
    // $quote->companyName = $quote_information['company_name'];
    // $quote->companyEmail = $quote_information['company_email'];
    // $quote->companyAddress = $quote_information['company_address'];
    // $quote->companyCity = $quote_information['company_city'];
    // $quote->companyPhoneNumber = $quote_information['company_phone'];
    // $quote->province = $quote_information['company_province'];
    // $quote->postalCode = $quote_information['company_postal_code'];
    // $quote->minLobsterSizes = $quote_information['min_lobster_size'];
    // $quote->maxLobsterSizes = $quote_information['max_lobster_size'];
    // $quote->totalLiveLobsterPounds = $quote_information['total_live_lobster_pounds'];
    // $quote->totalFrozenLobsterPounds = $quote_information['total_frozen_lobster_pounds'];
    // $quote->clamMeatPounds = $quote_information['total_clam_pounds'];
    // $quote->shrimpMeatPounds = $quote_information['total_shrimp_pounds'];
    // $quote->totalCostOfLiveLobster = $quote_information['total_cost_of_live_lobster'];    
    // $quote->totalCostOfFrozenLobster = $quote_information['total_cost_of_frozen_lobster'];
    // $quote->totalCostOfClamMeat = $quote_information['total_cost_of_clam_meat'];
    // $quote->totalCostOfShrimp = $quote_information['total_cost_of_shrimp'];
    // $quote->liveLobsterUnitPrice = $quote_information['live_lobster_unit_price'];     
    // $quote->frozenLobsterUnitPrice = $quote_information['frozen_lobster_unit_price'];
    // $quote->clamMeatUnitPrice = $quote_information['clam_meat_unit_price'];
    // $quote->shrimpMeatUnitPrice = $quote_information['shrimp_meat_unit_price'];
    // $quote->subTotal = $quote_information['sub_total'];
    // $quote->shippingCost = $quote_information['shipping'];
    // $quote->finalCost =  $quote_information['final_cost'];
    // $quote->save();

    

    // return view('pages.quote-summary',  ['information' => $quote]);

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
