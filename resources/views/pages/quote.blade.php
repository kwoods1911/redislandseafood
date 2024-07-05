@extends('layout.default')

@section('content')

@auth
<body>


<div class="container quote-container">
<h1 class="page-header-text">Request Quote</h1>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/quote-summary" method="post">
    @csrf

    <div class="container">
        <div class="row">

            <div class="col">
            <div class="form-group">
        <label class="label-styling" for="company_name">Company Name:</label>
        <input type="text" name="company_name" class="form-control">
    </div>

    <div class="form-group">
        <label class="label-styling" for="company_email">Company Email:</label>
        <input type="email" name="company_email" class="form-control">
    </div>

    <div class="form-group">
        <label class="label-styling" for="company_phone">Company Phone Number:</label>
        <input type="tel" id="phone" name="company_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control">
    </div>

    <div class="form-group">
        <label class="label-styling" for="company_address">Company Address:</label>
        <input type="text" name="company_address" class="form-control">
    </div>

    <div class="form-group">
        <label class="label-styling" for="company_city">City:</label>
        <input type="text" name="company_city" class="form-control">
    </div>

    <div class="form-group">
        <label class="label-styling" for="company_province">Province:</label>
        <input type="text" name="company_province" class="form-control">
    </div>
    
<!-- Validation is needed here -->
    <div class="form-group">
        <label class="label-styling" for="company_postal_code">Postal Code:</label>
        <input type="text" name="company_postal_code" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" class="form-control">
    </div>
            </div>

            <div class="col">
                
        <div class="form-group">
            <label class="label-styling" for="min_lobster_size">Lobster Range</label>
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
            <label class="label-styling" for="total_live_lobster_pounds">Total Live Lobsters (Pounds):</label>
            <input name="total_live_lobster_pounds" type="number" class="form-control">
        </div>
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label class="label-styling" for="total_frozen_lobster_pounds">Total Frozen Lobsters (Pounds):</label>
            <input name="total_frozen_lobster_pounds" type="number" class="form-control">
        </div>

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label class="label-styling" for="total_clam_pounds">Total Clam Meat (Pounds):</label>
            <input name="total_clam_pounds" type="number" class="form-control">
        </div>

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label class="label-styling" for="">Total Shrimp Meat (Pounds):</label>
            <input name="total_shrimp_pounds" type="number" class="form-control">
        </div>
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
            </div>
        @endif
            </div>
        </div>

    </div>
  

        
        <button type="submit" class="btn btn-primary send-btn">Send</button>
    </form>
</body>
</div>



@else
<body>
        <div class="container quote-container">
            <h1 class="page-header-text">Register or Login for a free Quote !</h1>
            <a class="btn btn-primary register-btn" href="/register">Register</a>
            <a class="btn btn-primary register-btn" href="/login">Login</a>
        </div>
</body>

@endauth

@stop

