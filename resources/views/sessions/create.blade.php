@extends('layout')

@section('content')
<div class="col-sm-8">
  <h1>Sign in</h1>
  <form method="POST" action="/login">
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Sign in">
    </div>

  </form>
  <div class="form-group">
    @include('partials.errors')
  </div>
</div>
@endsection