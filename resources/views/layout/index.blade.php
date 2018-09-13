<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>News | @yield('title')</title>
  <base href="{{ asset('')}}">
  <!-- Bootstrap Core CSS -->
  <link href="front_asset/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="front_asset/css/shop-homepage.css" rel="stylesheet">
  <link href="front_asset/css/my.css" rel="stylesheet">
  @yield('css')
</head>

<body>
 
  @include('layout.header')

  <!-- Page Content -->
  @yield('content')
  <!-- end Page Content -->

  <!-- Footer -->
  @include('layout.footer')
  <!-- end Footer -->
  <!-- jQuery -->
  <script src="front_asset/js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="front_asset/js/bootstrap.min.js"></script>
  <script src="front_asset/js/my.js"></script>
  @yield('jquery')
</body>

</html>