<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الماس</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- js link ...................................... -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="CSS/home-nav.css">
</head>
<body>
    <section class="home">
        <div class="home-nav">
            <div class="left-nav">
                <ul class="nav-list"> 
                    <img class="img" src="{{URL('images/logo.jpg')}}" alt="">   
                    <li class="nav-item @if($page == '/') active @endif">
                        <a href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{url('hotels')}}">Hotels</a>
                </li>
                    <li class="nav-item @if($page == 'about') active @endif">
                        <a href="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact">Contact</a>
                    </li>
                </ul>
                </div>
                <div class="right-nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login">Login</a>
                        </li>
                    </ul>
            </div>
        </div>
            <!-- <div class='the-best'>
              <div></div>
                <span>
                    Best Website For Your Future Life
                </span>
            </div> -->
            <div class="search-box">
                <h3>Search and book Your Favorite Hotel</h3>
                <form action="{{ url('search') }}" method="post" class="needs-validation" novalidate="" id="search-form">
                @csrf
                <div class="input-group ps-5">
                    <div class="search-item" id="navbar-search-autocomplete" class="form-outline">
                        <select type="text" class="search-field" name="search_term">
                            <option disabled selected>City</option>
                            <option value="1">kabul</option>
                            <option value="2">Herat</option>
                            <option value="3">Mazari Shareef</option>
                            <option value="4">Nangarhar</option>
                            <option value="5">Kandahar</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>
                </div>
</form>
            </div>
    </section>
</body>
</html>
