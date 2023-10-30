<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="backend/dashboard.css">
    <link rel="stylesheet" href="{{ asset('Bootstrap/Css/bootstrap.min.css') }}">

    {{-- bootstrap link................... --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{URL('images/logo.jpg')}}" alt="">
        </div>
        <ul class="menu">
            <li class="active">
                <a href="#"><span>Dashboard</span></a>
            </li>
            <li>
                <a href="#"><span>Dashboard</span></a>
            </li>
            <li>
                <a href="#"><span>Dashboard</span></a>
            </li>
            <li>
                <a href="#"><span>Dashboard</span></a>
            </li>
            <li>
                <a href="#"><span>Dashboard</span></a>
            </li>
            <li class="logout">
                <a href="login">Logout</a>
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