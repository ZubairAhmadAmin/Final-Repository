@extends('Frontend.layouts.master')

    <div class="home-color">
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form class="register" action="{{ route('login-user') }}" method="post">
             @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div>
                <h3>Login Here</h3>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" id="username" value="{{old('email')}}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" id="password" value="{{old('password')}}">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div>
                <button class="form-btn">Log In</button>
                <button id="back-btn" class="btn btn-light mt-5 text-decoration-none"><a
                        href="register">Back</a></button>
            </div>
        </form>
    </div>
