<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="backend/dashboard.css">
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
                <a href="#"><span>Logout </span></a>
            </li>
        </ul>
    </div>
    <div class="main-contant">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Dashboard  </h2>
            </div>
            <div class="user-info">
                <img src="{{URL('images/logo.jpg')}}" alt="">
            </div>
        </div>
    </div>
    @yield('contant')
</body>
</html>