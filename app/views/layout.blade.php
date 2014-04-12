<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Bootflat</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/resources/fonts.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/resources/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/bootflat.css">
    <style>
      @yield('styles')
    </style>
  </head>
  <body>
    @yield('content')
    <script src="/resources/jquery-1.10.1.min.js"></script>
    <script src="/resources/bootstrap.min.js"></script>
    <script src="/resources/bootbox.min.js"></script>
    <script>
      @yield('scripts')
    </script>
  </body>
</html>