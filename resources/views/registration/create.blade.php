@extends('layout')

@section('content')
<div class="col-sm-8 blog-main">
  <h1>Register</h1>
  <form method="POST" action="/register">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
      <label for="password_confirmation">Password again:</label>
      <input type="password" class="form-control" name="password_confirmation" required>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>

  </form>
  <div class="form-group">
    @include('partials.errors')
  </div>
</div>
@endsection