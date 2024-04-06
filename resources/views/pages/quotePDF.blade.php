<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Quote: {{ $id }}</title>
</head>

<style>
    /* h1{
        color:red;
    } */
</style>
<body>

<div>
    <h1>Quote Summary</h1>
    <div class="container">
        <div class="row">
            <div class="col">
            <table>
                <tr>
                    <th>Vendor</th>
                </tr>
                <tr>
                    <td>Red Island Seafood</td>
                </tr>
                <tr>
                <td>Sales Department</td>
                </tr>
                <tr>
                <td>17 Something Street </td>
                </tr>
                <tr>
                <td>Charlottetown, PE, C1A 5E6</td>
                </tr>
                <tr>
                <td>Phone: (XXX) XXX-XXXX</td>
                </tr>
            </table>
            </div>

            <div class="col">
                    <table>
                        <tr>
                            <th>Ship To: </th>
                        </tr>

                        <tr>
                            <td>{{$companyName}}</td>
                        </tr>
                        <tr>
                             <td>{{$companyEmail}}</td>
                        </tr>
                        <tr>
                            <td>{{$companyAddress}} </td>
                        </tr>
                        <tr>
                            <td>{{$companyCity}}, {{$province}}, {{$postalCode}}</td>
                        </tr>
                        <tr>
                            <td>Phone: {{$companyPhoneNumber}}</td>
                        </tr>
                    </table>
                    </div>
        </div>
    <!-- Ship To -->
    </div>
    <div>
        <h3>Quote # </h3>
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>

            @if($totalLiveLobsterPounds > 0)
            <tr>
                <td>1</td>
                <td>Live Lobster ({{$minLobsterSizes}} lbs - {{$maxLobsterSizes}} lbs )</td>
                <td>{{$totalLiveLobsterPounds}}</td>
                <td>{{$liveLobsterUnitPrice}}</td>
                <td> $ {{$totalCostOfLiveLobster}}</td>
            </tr>
            @endif


            @if($totalFrozenLobsterPounds > 0)
            <tr>
                <td>2</td>
                <td>Cooked Lobster </td>
                <td>{{$totalFrozenLobsterPounds}}</td>
                <td>{{$frozenLobsterUnitPrice}}</td>
                <td>{{$totalCostOfFrozenLobster}}</td>
            </tr>
            @endif



            @if($clamMeatPounds > 0)
            <tr>
                <td>3</td>
                <td>Clam Meat</td>
                <td>{{$clamMeatPounds}}</td>
                <td>{{$clamMeatUnitPrice}}</td>
                <td> $ {{$totalCostOfClamMeat}}</td>
            </tr>
            @endif

            @if($shrimpMeatPounds > 0)
            <tr>
                <td>4</td>
                <td>Shrimp Meat</td>
                <td>{{$shrimpMeatPounds}}</td>
                <td>{{$shrimpMeatUnitPrice}}</td>
                <td>$ {{$totalCostOfShrimp}}</td>
            </tr>
            @endif


            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Shipping</th>
                <th>Subtotal</th>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td> $ {{$shippingCost}}</td>
                <td> $ {{$subTotal}}</td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Final Cost</th>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>$ {{$finalCost}}</td>
            </tr>        
    </table>
</div>

<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</footer>


</body>

</html>


