@extends('Backend.layouts.master')

@section('contant')

    <form action="{{ url('update/'.$hotel->id) }}" method="post" >
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
       <a href="{{url('dashboard')}}"class="btn btn-primary float-end m-5">Back></a>
        @csrf
        @method('PUT')
        <div>
            <div>
                <div>
                    <h3>Edit Hotel</h3>
                </div>
                <label for="hotelname" class="form-label">hotel Name</label>
                <input type="text" name="hotel-name" class="form-control" placeholder="hotel name" id="hotel" value="{{ $hotel->hotel_name }}">
            </div>
            <div>
                <label for="hoteladdress" class="form-label">Hotal Address</label>
                <input type="text" class="form-control" name="hotel-address" placeholder="hotel address" id="address" value="{{ $hotel->hotel_address }}">
            </div>
            <div>
                <label for="bookingprice" class="form-label">Booking Price</label>
                <input type="text" class="form-control" name="booking-price" placeholder="booking price" id="booking"
                    value="{{ $hotel->booking_price }}">
            </div>

            <div>
                <label for="solon" class="form-label">Total Solon</label>
                <input type="text" class="form-control" name="total-solon" placeholder="total solon" id="solon"
                    value="{{ $hotel->total_solon }}">
            </div>

            <div>
                <label for="capacity" class="form-label">Total Capacity</label>
                <input type="text" class="form-control" name="total-capacity" placeholder="total capacity" id="capacity"
                    value="{{ $hotel->total_capacity}}">
            </div>

            <button type="submit" class="btn btn-success m-3">Update</button>
        </div>
    </form>
@endsection


