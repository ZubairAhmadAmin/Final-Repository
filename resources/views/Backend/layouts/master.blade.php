<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('Bootstrap/Css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{asset('backend/dashboard.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('Bootstrap/Js/bootstrap.min.js')}}"></script>


    {{-- bootstrap link................... --}}

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{URL('images/logo.jpg')}}" alt="">
        </div>
        <ul class="menu">
            <li class="active">
                <a href="{{url('dashboard')}}"><span>Hotels</span></a>
            </li>
            <li>
                <a href="{{url('bookings')}}"><span>Bookings</span></a>
            </li>
            @if(\Auth::user()->user_type == 2)
                <li>
                    <a href="{{url('users')}}"><span>Users</span></a>
                </li>
            @endif
            <li class="logout">
                <a href="{{url('logout')}}">Logout</a>
            </li>
        </ul>
    </div>
    <div class="main-contant">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Dashboard  </h2>
            </div>
            <div class="user-info">

                {{-- @foreach ($data as $item)
                    <h1>{{$item->name}}</h1>
                    <p>{{$item->email}}</p>    
                @endforeach --}}
            </div>
        </div>
        @yield('contant')
    </div>
</body>
</html>