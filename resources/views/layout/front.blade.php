<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("assets/bootstrap/dist/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/sweetalert2/dist/sweetalert2.min.css")}}">
@yield("css")
</head>
<body>
    @include('layout.front.navbar')
    
    
    @yield('icerik')


    @include('layout.front.footer')
    <script src="{{ asset("assets/bootstrap/dist/js/bootstrap.min.js")}}"></script>
    <script src="{{ asset("assets/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{ asset("assets/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{ asset("assets/sweetalert2/dist/sweetalert2.all.min.js")}}"></script>

    @yield("js")

</body>
</html>