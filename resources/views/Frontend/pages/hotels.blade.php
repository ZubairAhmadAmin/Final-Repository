
@extends('Frontend.layouts.app')
@section('style')    
<div class="city-name">
    @foreach ($hotels as $item)
        <h1 class="text-center">{{$item->city->city_name}}</h1>
    @endforeach
</div>
    
<div class="row">
    @foreach ($hotels as $item)
    <div class="col-3 m-5">
        <div class="card">
            <img src="{{'upload/'.$item->hotel_image}}" width="275px" height="185px" class="card-img-top" alt="hotel image">
            <div class="card-body">
                <p>Hotel name:{{$item->hotel_name}}</p>
                <p>Hotel Address: {{$item->hotel_address}}</p>
                <p>Booking Price :{{$item->booking_price}}</p>
                <p>Totle Capacity: {{$item->total_solon}}</p>
                <p>Totle Capacity: {{$item->total_capacity}}</p>
                <button class="btn btn-primary float-end"><a href="hotel">Details</a></button>
            </div>
        </div> 
    </div>
    @endforeach
</div>
<div>
    <button class="btn btn-primary m-5 float-end"><a href="/">Back</a></button>
</div>

@endsection
{{--  </body>
</html>
  --}}

