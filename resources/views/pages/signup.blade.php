@extends('layout.default')

@section('content')
<body>
    <h1>Register</h1>

<form method="post" action="/registration-confirmation">
    @csrf
  <div class="form-group">
    <label for="name">Name </label>
    <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Full Name" required>
  </div>

  <div class="form-group">
  <label for="email">Email address</label>
    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
  <label for="confirm_email">Confirm Email address</label>
    <input name="email_confirmation" type="email" class="form-control" id="emailConfirmation" aria-describedby="emailHelp" placeholder="Confirm Email" required>
  </div>

  <div class="form-group">
  <label for="password">Password</label>
    <input name="password" type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Password" required>
  </div>


  <div class="form-group">
  <label for="">Confirm Password</label>
    <input name="confirm_password" type="password" class="form-control" id="confirm_password" aria-describedby="emailHelp" placeholder="Confirm Password" required>
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</body>

@stop