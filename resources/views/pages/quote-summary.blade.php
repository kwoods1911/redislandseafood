@extends('layout.default')

@section('content')
<body>
<div>
    <span>
        LOGO
        <img src="#" alt="">
    </span>
</div>
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
                            <td>{{$information['company_name']}}</td>
                        </tr>
                        <tr>
                             <td>{{$information['company_email']}}</td>
                        </tr>
                        <tr>
                            <td>{{$information['company_address']}} </td>
                        </tr>
                        <tr>
                            <td>{{$information['company_city']}}, {{$information['company_province']}}, {{$information['company_postal_code']}}</td>
                        </tr>
                        <tr>
                            <td>Phone: {{$information['company_phone']}}</td>
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
            @if($information['total_live_lobster_pounds'] > 0)
            <tr>
                <td>1</td>
                <td>Live Lobster ({{$information['min_lobster_size']}} lbs - {{$information['max_lobster_size']}} lbs )</td>
                <td>{{$information['total_live_lobster_pounds']}}</td>
                <td>{{$information['live_lobster_unit_price']}}</td>
                <td>{{$information['total_cost_of_live_lobster']}}</td>
            </tr>
            @endif

            @if($information['total_frozen_lobster_pounds'] > 0)
            <tr>
                <td>2</td>
                <td>Cooked Lobster </td>
                <td>{{$information['total_frozen_lobster_pounds']}}</td>
                <td>{{$information['frozen_lobster_unit_price']}}</td>
                <td>{{$information['total_cost_of_frozen_lobster']}}</td>
            </tr>
            @endif
            
            @if($information['total_clam_pounds'] > 0)
            <tr>
                <td>3</td>
                <td>Clam Meat</td>
                <td>{{$information['total_clam_pounds']}}</td>
                <td>{{$information['clam_meat_unit_price']}}</td>
                <td>{{$information['total_cost_of_clam_meat']}}</td>
            </tr>
            @endif

            @if($information['total_cost_of_shrimp'] > 0)
            <tr>
                <td>4</td>
                <td>Shrimp Meat</td>
                <td>{{$information['total_cost_of_shrimp']}}</td>
                <td>{{$information['shrimp_meat_unit_price']}}</td>
                <td>{{$information['total_cost_of_shrimp']}}</td>
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
                <td> $ {{$information['shipping']}}</td>
                <td> $ {{$information['sub_total']}}</td>
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
                <td>$ {{$information['final_cost']}}</td>
            </tr>
        </table>
    </div>
    
    
    @php
        $json = json_encode($information);
    @endphp



    <div class="container">
    <form method="POST" action="{{ route('quote-submitted') }}">
            @csrf
            <input type="hidden" name="quote_information" value="{{$json}}">
            <button class="btn btn-primary" type="submit">Confirm & Email</button>
    </form>

    
    <a href="{{ route('quote') }}">
        <button class="btn btn-primary"><< Go Back</button>
    </a>
    </div>

    

    
<!-- 
    <form action="/generate-pdf" method="get">
        @csrf
        <input type="hidden" name="id" value="">
        <button id="quoteButton" type="submit" name='quote' class="btn btn-primary"> Download Copy</button>
    </form> 
 -->
    
    
    <!-- Add button to go back -->

    
</div>
</body>
@stop