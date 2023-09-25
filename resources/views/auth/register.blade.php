@extends('layouts.master')
    <div class="home-color">
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <form action="{{ route('register-user') }}" method="post" class="register">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div>
                <div>
                    <div>
                        <h3>Register Here</h3>
                    </div>
                    <label for="username">User Name</label>
                    <input type="text" name="name" placeholder="User Name" id="username" value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" id="username" value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password"
                        value="{{ old('password') }}">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button class="form-btn">Register</button>
            </div>
        </form>
    </div>
