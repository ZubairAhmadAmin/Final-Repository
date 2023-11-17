@extends('Frontend.layouts.app')

@section('style')
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
            <div class="row">
            <div class="mb-3">
                        <h3>Register Here</h3>
                    </div>
                    <div class="row mb-2">
                    <div class="col-6">
                    <label for="username">User Name</label>
                    <input type="text" name="name" placeholder="User Name" id="username" value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-6 mb-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" id="username" value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                    </div>
            
                <div class="col-6 mb-2">
                    <label for="email">Mobile Number</label>
                    <input type="text" name="mobile_number" placeholder="Mobile No" id="username" value="{{ old('mobile_number') }}">
                    <span class="text-danger">
                    </span>
                </div>
                <div class="col-6 mb-2">
                    <label for="email">Address</label>
                    <input type="text" name="address" placeholder="Address" id="username" value="{{ old('address') }}">
                    <span class="text-danger">
                    </span>
                </div>
                <div class="col-6 mb-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col-6 mb-2">
                    <label for="password">Password Confirmation</label>
                    <input type="password" name="password_confirmation" placeholder="Password" id="password">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-check form-switch mb-5" style="padding-left:50px">
                    <input class="form-check-input mt-3" name="user_type" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width:35px;height:20px">
                    <label class="form-check-label mt-3" for="flexSwitchCheckDefault">Please select if you are a hotel owner</label>
                </div>

                <button class="form-btn">Register</button>
                <div calss="d-flex justify-content-between">
                <a id="back-btn" class="btn btn-light mt-3 text-decoration-none"
                    href="/">Back</a>
                <a id="back-btn" class="btn btn-light mt-3 text-decoration-none float-end"
                    href="{{url('login')}}">Login</a>
                </div>
                
            </div>
        </form>
    </div>
@endsection