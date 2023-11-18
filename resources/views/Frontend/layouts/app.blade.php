<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الماس</title>

    <link rel="stylesheet" href="{{ asset('Bootstrap/Css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}">


    {{-- bootstrap link................... --}}

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
        <!-- pages style link ................ -->
        <link rel="stylesheet" href="app.css">
        {{-- <link rel="stylesheet" href="booking.js"> --}}
        <link rel="stylesheet" href="CSS/book-form.css">
        <link rel="stylesheet" href="CSS/form.css">
        <link rel="stylesheet" href="{{asset('backend/dashboard.css')}}">
    
    
        <!-- js link ...................................... -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('Bootstrap/Js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        @yield('style')
    </body>
    </html>


