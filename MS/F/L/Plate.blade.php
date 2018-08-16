<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.7.7, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.7.7, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/icon-180x180.png" type="image/x-icon">
  <meta name="description" content="">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
@include("F.L.Object.css")



  
</head>
<body>

@include("F.L.Object.Nav")


@yield('content')


@include("F.L.Object.Footer")

@include("F.L.Object.js")
  


  
</body>
</html>