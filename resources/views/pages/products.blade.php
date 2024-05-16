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
            <table class="table">
            <tr>
                <th>
                    Live Lobsters (1.5lbs - 2lbs market lobsters)
                </th>
            </tr>
                <tr>
                    <td><b>Price:</b> $20.00 per pound </td>
                    <td><b>Order Quantity:</b> 20 - 50 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $15.50 per pound </td>
                    <td><b>Order Quantity:</b> 51 - 299 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $14.50 per pound</td>
                    <td><b>Order Quantity:</b> 300 - 499 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $13.50 per pound</td>
                    <td><b>Order Quantity:</b> 500 - 999 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $12.50 per pound </td>
                    <td><b>Order Quantity:</b> 1000 + pounds</td>
                </tr>
            </table>
            </div>

            <div class="col">
                <h4>Min order 20 lb</h4>
            </div>
        </div>


        <div class="row">
            <div class="col">
            
            <table class="table">
            <tr>
                <th>
                    <h4>Cooked Lobster</h4>
                </th>
            </tr>
                <tr>
                    <td><b>Price:</b> $22.00 per pound </td>
                    <td><b>Order Quantity:</b> 20 - 50 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $17.50 per pound</td>
                    <td><b>Order Quantity:</b> 51 - 299 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $16.50 per pound</td>
                    <td><b>Order Quantity:</b> 300 - 499 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $15.50 per pound </td>
                    <td><b>Order Quantity:</b> 500 - 999 pounds</td>
                </tr>
                <tr>
                    <td><b>Price:</b> $14.50 per pound</td>
                    <td><b>Order Quantity:</b> 1000 + pounds</td>
                </tr>
            </table>
            </div>
            <div class="col">
                    <h4>Min order 20 lb</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <h4>Shrimp</h4>
            <table class="table">
                <tr>
                    <td><b>Price: </b> $9.50 per pound</td>
                </tr>
            </table>
            </div>
            <div class="col">
            <h4>Min order 100 lb</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <h4>Clam Meat</h4>
            <table class="table">
                <tr>
                    <td><b>Price: </b> $10.50 per pound </td>
                </tr>
            </table>
            </div>
            <div class="col">
            <h4>Min order 100 lb</h4>
            </div>
        </div>

    </div>
</body>
@stop
