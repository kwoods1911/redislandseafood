@extends('layout.default')

@section('content')
<body>
    <div id="inventory-header" class="header">
        <h1>Inventory</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
            <h4>Lobster</h4>
            <table>
            <tr>
                <th>
                    Live Lobsters (1.5lbs - 2lbs market lobsters)
                </th>
            </tr>
                <tr>
                    <td>Price: $20.00 per pound </td>
                    <td>Order Quantity: 20 - 50 pounds</td>
                </tr>
                <tr>
                    <td>Price: $15.50 per pound </td>
                    <td>Order Quantity: 51 - 299 pounds</td>
                </tr>

                <tr>
                    <td>Price: $14.50 per pound</td>
                    <td>Order Quantity: 300 - 499 pounds</td>
                </tr>

                <tr>
                    <td>Price: $13.50 per pound</td>
                    <td>Order Quantity: 500 - 999 pounds</td>
                </tr>

                <tr>
                    <td>Price: $12.50 per pound </td>
                    <td>Order Quantity: 1000 + pounds</td>
                </tr>
                
            </table>
            </div>

            <div class="col">
                <span>Min order 20 lb</span>
            </div>
        </div>


        <div class="row">
            <div class="col">
            <h4>Lobster</h4>

            <table>
                <tr>
                    <td><b>Price:</b> $22.00 per pound </td>
                    <td><b>Order Quantity:</b> 20 - 50 pounds</td>
                </tr>
            </table>
            </div>

            <div class="col">
            <span>Min order 20 lb</span>
            </div>
        </div>

    </div>
</body>
@stop