<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
  </head>

  <body>

    @include('partials.nav')

    @include('partials.header')
    
    @if( $flash=session('message') )
    <div class="alert alert-success">
        {{ $flash }}
    </div>
    @endif

    <div class="container">

      <div class="row">

        @yield('content')

        @include('partials.sidebar')

      </div><!-- /.row -->

    </div><!-- /.container -->

    @include('partials.footer')

    @include('partials.scripts')

  </body>
</html>    
