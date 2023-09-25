<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الماس</title>
    <!-- register page style -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- pages style link ................ -->
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="hotels.css">


    <!-- css link ..................................... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- js link ...................................... -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container">
            <img class="img" src="{{URL('images/logo4.jpg')}}" alt="">
            <ul class="navbar-nav">
                <div class="center-link">
                    <li class="nav-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="search">Search</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact">Contact</a>
                    </li>
                </div>
                <div class="right-link">
                </div>
                    <li class="nav-item">
                        <a href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login">Login</a>
                    </li>
            </div>
            </ul>
    </nav>

    @yield('contant')
</body>
</html>