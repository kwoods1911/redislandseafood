@extends('layout.default')

@section('content')


<body>
    <h1>Request Quote</h1>

    <form action="/quote-submitted" method="post">
    @csrf

    <div class="form-group">
        <label for="">Company Name:</label>
        <input type="text" name="company_name">
    </div>


    <div class="form-group">
        <label for="">Company Email:</label>
        <input type="email" name="company_email">
    </div>

    <div class="form-group">
        <label for="">Company Phone Number:</label>
        <input type="tel" id="phone" name="company_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
    </div>

    <div class="form-group">
        <label for="">Company Address:</label>
        <input type="text" name="company_address">
    </div>

    <div class="form-group">
        <label for="">Province:</label>
        <input type="text" name="company_province">
    </div>
    
<!-- Validation is needed here -->
    <div class="form-group">
        <label for="">Postal Code:</label>
        <input type="text" name="company_postal_code" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]">
    </div>

        <div class="form-group">
            <label for="">Lobster Range</label>
            <!-- <input name="min_lobster_size" type="number" class="form-control"> -->
            <select name="min_lobster_size">
                <option value="1">1 lbs</option>
                <option value="1.5">1.5 lbs</option>
                <option value="2">2 lbs</option>
            </select>
            <small>lbs</small>

            <span>to:</span>
        
        <select name="max_lobster_size">
                <option value="1">1 lbs</option>
                <option value="1.5">1.5 lbs</option>
                <option value="2">2 lbs</option>
        </select>
        <small>lbs</small>
        </div>

        <div class="form-group">
            <label for="">Total Live Lobsters (Pounds):</label>
            <input name="total_live_lobster_pounds" type="number" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Total Frozen Lobsters (Pounds):</label>
            <input name="total_frozen_lobster_pounds" type="number" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Total Clam Meat (Pounds):</label>
            <input name="total_clam_pounds" type="number" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Total Shrimp Meat (Pounds):</label>
            <input name="total_shrimp_pounds" type="number" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

@stop

