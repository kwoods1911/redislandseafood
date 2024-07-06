<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ 'pdf.css' }}" type="text/css">
    <title>Invoice</title>
</head>

<body>
<table class="w-full">
    <tr>
        <td class="w-half">
            <!-- <img src="{{ asset('RedIslandSeafood  Logo.png') }}" alt="red island seafood logo"> -->
             <span class="logo">RED ISLAND SEAFOOD</span>
        </td>

        <td class="w-half">
            <h3>Quote # {{ $id }} </h3>
        </td>
    </tr>
</table>

    

    <div class="margin-top">
        <table class="w-full">
        <tr>
            <td class="w-half">
                <div><h4>From:</h4></div>
                <div>Red Island Seafood<div>
                <div>Sales Department</div>
                <div>17 Something Street </div>
                <div>Charlottetown, PE, C1A 5E6</div>
                <div>Phone: (1800) 902-1000</div>
            </td>
            <td class="w-half">
                    <div><h4>To: </h4></div>
                    <div>{{$companyName}}</div>
                    <div>{{$companyEmail}}</div>
                    <div>{{$companyAddress}} </div>
                    <div>{{$companyCity}}, {{$province}}, {{$postalCode}}</div>
                    <div>Phone: {{$companyPhoneNumber}}</div>
            </td>
        </tr>   
    </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Item</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>

            @if($totalLiveLobsterPounds > 0)
            <tr class="items">
                <td>1</td>
                <td>Live Lobster ({{$minLobsterSizes}} lbs - {{$maxLobsterSizes}} lbs )</td>
                <td>{{$totalLiveLobsterPounds}}</td>
                <td>{{$liveLobsterUnitPrice}}</td>
                <td> ${{$totalCostOfLiveLobster}}</td>
            </tr>
            @endif

            @if($totalFrozenLobsterPounds > 0)
            <tr class="items">
                <td>2</td>
                <td>Cooked Lobster </td>
                <td>{{$totalFrozenLobsterPounds}}</td>
                <td>{{$frozenLobsterUnitPrice}}</td>
                <td>{{$totalCostOfFrozenLobster}}</td>
            </tr>
            @endif

            @if($clamMeatPounds > 0)
            <tr class="items">
                <td>3</td>
                <td>Clam Meat</td>
                <td>{{$clamMeatPounds}}</td>
                <td>{{$clamMeatUnitPrice}}</td>
                <td> ${{$totalCostOfClamMeat}}</td>
            </tr>
            @endif

            @if($shrimpMeatPounds > 0)
            <tr class="items">
                <td>4</td>
                <td>Shrimp Meat</td>
                <td>{{$shrimpMeatPounds}}</td>
                <td>{{$shrimpMeatUnitPrice}}</td>
                <td>${{$totalCostOfShrimp}}</td>
            </tr>
            @endif   
    </table>

    </div>

    <div class="total">
        <div>Shipping: ${{$shippingCost}}</div>
        <div>Subtotal: ${{$subTotal}}</div>
        <div>Final: ${{$finalCost}}</div> 
    </div>

    <div class="footer margin-top">
        <div>Thank you</div>
        <div>Red Island Lobster</div>
    </div>
</body>

</html>


