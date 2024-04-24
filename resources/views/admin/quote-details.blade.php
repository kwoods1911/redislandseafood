@extends('layout.default')

@section('content')
<body>
    <div>
        <h1>Quote # </h1>
    </div>
    
    <div class="container">
            <h3>Size Range</h3>
            <span>{{$quote->minLobsterSizes}}</span> <span>lbs</span>
            <span>to</span>
            <span>{{$quote->maxLobsterSizes}}</span><span>lbs</span>
        </div>
    <div class="container">
    <!-- client information -->
    <table class="table">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">Company</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Postal Code</th>
                    </tr>
            </thead>
            
            <tr>
                <td>{{$quote->companyName}}</td>
                <td>{{$quote->companyEmail}}</td>
                <td>{{$quote->companyPhoneNumber}}</td>
                <td>
                        {{$quote->companyAddress}} ,
                        {{$quote->companyCity}} ,
                        {{$quote->companyProvince}}
                </td>
                <td>{{$quote->postalCode}}</td>
            </tr>

        </table>

<!-- Product rate -->
<table class="table">
    <thead class="thead-dark">
        <tr>
                <th scope="col">Lobster Cost Per Pound</th>
                <th scope="col">Frozen Lobster lbs Price per pound</th>
                <th scope="col">Clam Meat lbs price per pound</th>
                <th scope="col">Shrimp lbs price per pound</th>
        </tr>
    </thead>

    
            
    <tr>
        <td> {{$quote->liveLobsterUnitPrice}}</td>
        <td> {{$quote->frozenLobsterUnitPrice}}</td>
        <td> {{$quote->clamMeatUnitPrice}}</td>
        <td> {{$quote->shrimpMeatUnitPrice}}</td>
    </tr>
</table>
        
<!-- Product pounds -->
<table class="table">
    <thead class="thead-dark">
        <tr>
                <th scope="col">Amount of Lobster lbs</th>
                <th scope="col">Amount of Frozen Lobster lbs</th>
                <th scope="col">Amount of clam Meat lbs</th>
                <th scope="col">Amount Of Shrimp lbs</th>
                <th scope="col">Total pounds</th>
        </tr>
    </thead>

    <tr>
        <td> {{$quote->totalLiveLobsterPounds}}</td>
        <td> {{$quote->totalFrozenLobsterPounds}}</td>
        <td> {{$quote->clamMeatPounds}}</td>
        <td> {{$quote->shrimpMeatPounds}}</td>
    </tr>
</table>


    <!-- product information -->

    <table class="table">
    <thead class="thead-dark">
            <tr>
                <th scope="col">Cost of Lobster</th>
                <th scope="col">Cost Of Frozen Lobster</th>
                <th scope="col">Cost of clam Meat</th>
                <th scope="col">Total Cost Of Shrimp</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Shipping</th>
                <th scope="col">Total</th>
            </tr>
    </thead>
    <tr>
        <td>$ {{$quote->totalCostOfLiveLobster}}</td>
        <td>$ {{$quote->totalCostOfFrozenLobster}}</td>
        <td>$ {{$quote->totalCostOfClamMeat}}</td>
        <td>$ {{$quote->totalCostOfShrimp}}</td>
        <td>$ {{$quote->subTotal}}</td>
        <td>$ {{$quote->shippingCost}}</td>
        <td>$ {{$quote->finalCost}}</td>
    </tr>
    </table>


</div>
    
</body>
@stop