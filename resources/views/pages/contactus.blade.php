@extends('layout.default')

@section('content')
<body>
    <div>
        <h1>Contact Us</h1>

@include('pages.validation-message')

<form method="post" action="/store-contact">
    @csrf
  <div class="form-group">
    <label for="">Name </label>
    <input name="contact_name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Full Name" required>
  </div>

  <div class="form-group">
  <label for="">Email address</label>
    <input name="contact_email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
  <input name="contact_email_confirmation" type="email" class="form-control" id="emailConfirmation" aria-describedby="emailHelp" placeholder="Confirm Email" required>
  </div>


<div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea name="contact_message" class="form-control" id="contactMessage" rows="3"></textarea>
</div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>



@stop