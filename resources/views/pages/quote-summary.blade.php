@extends('layout.default')

@section('content')
<body>
<div>
    <span>
        LOGO
        <img src="" alt="">
    </span>
</div>
<div>
    <h1>Quote Summary</h1>
    <!-- <p>{{$information}}</p> -->

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
                            <td>{{$information->companyName}}</td>
                        </tr>
                        <tr>
                             <td>{{$information->companyEmail}}</td>
                        </tr>
                        <tr>
                            <td>{{$information->companyAddress}} </td>
                        </tr>
                        <tr>
                            <td>{{$information->companyCity}}, {{$information->province}}, {{$information->postalCode}}</td>
                        </tr>
                        <tr>
                            <td>Phone: {{$information->companyPhoneNumber}}</td>
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
            <!-- apply -->
            @if($information->totalLiveLobsterPounds > 0)
            <tr>
                <td>1</td>
                <td>Live Lobster  ({{$information->minLobsterSizes}} lbs - {{$information->maxLobsterSizes}} lbs )</td>
                <td>{{$information->totalLiveLobsterPounds}}</td>
                <td>{{$information->liveLobsterUnitPrice}}</td>
                <td>{{$information->totalCostOfLiveLobster}}</td>
            </tr>
            @endif

            @if($information->totalFrozenLobsterPounds > 0)
            <tr>
                <td>2</td>
                <td>Cooked Lobster </td>
                <td>{{$information->totalFrozenLobsterPounds}}</td>
                <td>{{$information->frozenLobsterUnitPrice}}</td>
                <td>{{$information->totalCostOfFrozenLobster}}</td>
            </tr>
            @endif
            
            @if($information->clamMeatPounds > 0)
            <tr>
                <td>3</td>
                <td>Clam Meat</td>
                <td>{{$information->clamMeatPounds}}</td>
                <td>{{$information->clamMeatUnitPrice}}</td>
                <td>{{$information->totalCostOfClamMeat}}</td>
            </tr>
            @endif

            @if($information->shrimpMeatPounds > 0)
            <tr>
                <td>4</td>
                <td>Shrimp Meat</td>
                <td>{{$information->shrimpMeatPounds}}</td>
                <td>{{$information->shrimpMeatUnitPrice}}</td>
                <td>{{$information->totalCostOfShrimp}}</td>
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
                <td> $ {{$information->shippingCost}}</td>
                <td> $ {{$information->subTotal}}</td>
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
                <td>$ {{$information->finalCost}}</td>
            </tr>
        </table>
    </div>
    

    
    <button type="submit" class="btn btn-primary"> Email Copy</button>
</div>
</body>


@stop