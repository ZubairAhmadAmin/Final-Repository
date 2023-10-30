@extends('Backend.layouts.master')

@section('contant')
    <form action="{{ url('store') }}" enctype="multipart/form-data" method="post" >
        {{-- @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif --}}
        {{-- @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif --}}
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        @csrf
        <div>
            <div class="card col-12 ">
                <div class="card-header">
                    <h3 class="text-center text-primary">Register Hotel</h3>
                </div>
            <div class="card-body">
                <label for="cityname" class="form-label text-primary">City Name</label>
                <input type="text" name="city-name" class="form-control" placeholder="city name">
                {{-- <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span> --}}
            <div>
                <label for="hotelname" class="form-label text-primary">hotel Name</label>
                <input type="text" name="hotel-name" class="form-control" placeholder="hotel name">
                {{-- <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span> --}}
            <div>
                <label for="hoteladdress" class="form-label text-primary">Hotal Address</label>
                <input type="text" class="form-control" name="hotel-address" placeholder="hotel address">
                {{-- <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span> --}}
            </div>
            <div>
                <label for="bookingprice" class="form-label text-primary">Booking Price</label>
                <input type="text" class="form-control" name="booking-price" placeholder="booking price">
                {{-- <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span> --}}
            </div>

            <div>
                <label for="solon" class="form-label text-primary">Total Solon</label>
                <input type="text" class="form-control" name="total-solon" placeholder="total solon">
                {{-- <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span> --}}
            </div>

            <div>
                <label for="capacity" class="form-label text-primary">Total Capacity</label>
                <input type="text" class="form-control" name="total-capacity" placeholder="total capacity">
                {{-- <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span> --}}
            </div>
            <div>
                <label for="hotelimage" class="form-label text-primary">Hotal Image</label>
                <input type="file" class="form-control" name="hotel_image" placeholder="hotel image">
                {{-- <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span> --}}
            </div>
            </div>

            <button type="submit" class="btn btn-success m-3">Register</button>
        </div>
    </form>

    <a href="{{url('dashboard')}}"class="btn btn-primary float-end m-5">Back></a>




    @endsection