<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="#">My Quotes</a>
        </h2>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="#">My Orders</a>
        </h2>
    </x-slot>

    <div class="py-12">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

    <div>
    <div class="container">
        <div class="row">
            <div class="col">
            <table>
                <tr>
                    <th>From</th>
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
                <td>Phone: (800) 902-1000</td>
                </tr>
            </table>
            </div>

            <div class="col">
                    <table>
                        <tr>
                            <th>To: </th>
                        </tr>
                        <tr>
                            <td>{{$quote->companyName}}</td>
                        </tr>
                        <tr>
                             <td>{{$quote->companyEmail}}</td>
                        </tr>
                        <tr>
                            <td>{{$quote->companyAddress}} </td>
                        </tr>
                        <tr>
                            <td>{{$quote->companyCity}}, {{$quote->companyProvince}}, {{$quote->companyPostalCode}}</td>
                        </tr>
                        <tr>
                            <td>Phone: {{$quote->companyPhone}}</td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>

    <div class="margin-top">
        <table class="table">
            <tr class="custom-header">
                <th>Item</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
            
            @if($quote->totalLiveLobsterPounds > 0)
            <tr>
                <td>1</td>
                <td>Live Lobster ({{$quote->minLobsterSize}} lbs - {{$quote->maxLobsterSize}} lbs )</td>
                <td>{{$quote->totalLiveLobsterPounds}}</td>
                <td>{{$quote->liveLobsterUnitPrice}}</td>
                <td>$ {{$quote->totalCostOfLiveLobster}}</td>
            </tr>
            @endif

            @if($quote->totalFrozenLobsterPounds > 0)
            <tr>
                <td>2</td>
                <td>Cooked Lobster </td>
                <td> {{$quote->totalFrozenLobsterPounds}}</td>
                <td>{{$quote->frozenLobsterUnitPrice}}</td>
                <td>$ {{$quote->totalCostOfFrozenLobster}}</td>
            </tr>
            @endif
            
            @if($quote->totalClamPounds > 0)
            <tr>
                <td>3</td>
                <td>Clam Meat</td>
                <td>{{$quote->totalClamPounds}}</td>
                <td>{{$quote->clamMeatUnitPrice}}</td>
                <td>$ {{$quote->totalCostOfClamMeat}}</td>
            </tr>
            @endif

            @if($quote->totalCostOfShrimp > 0)
            <tr>
                <td>4</td>
                <td>Shrimp Meat</td>
                <td>{{$quote->totalCostOfShrimp}}</td>
                <td>{{$quote->shrimpMeatUnitPrice}}</td>
                <td>$ {{$quote->totalCostOfShrimp}}</td>
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
                <td>$ {{$quote->shippingCost}}</td>
                <td>$ {{$quote->subTotal}}</td>
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
                <td>$ {{$quote->finalCost}}</td>
            </tr>
        </table>
    </div>

        




 

         
        </div>
    </div>
</x-app-layout>
