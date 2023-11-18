
@extends('Frontend.layouts.app')
@section('style')    
<div class="container">
<div class="row">
    @foreach ($hotels as $item)
    <?php $images = json_decode($item->hotel_images); ?>

    <div class="col-3 m-3" style="width:29%">
        <div class="card">
            <img src="{{asset(Storage::url($images[0]))}}" width="275px" height="185px" class="card-img-top" alt="hotel image">
            <div class="card-body">
                <p>Hotel name:{{$item->hotel_name}}</p>
                <p>Hotel Address: <span>{{$item->city->city_name}}</span><span> - {{$item->hotel_address}}</span></p>
                <p>Email address : {{$item->email}}</p>
                <p>Mobile_number : {{$item->mobile_number}}</p>
                <p>Total salons: {{$item->total_salons}}</p>
                <p>Total Capacity: {{$item->total_capacity}}</p>
                <p>Details: {{$item->description}}</p>
                <button class="btn btn-primary float-end"><a href="{{url('show-hotel/'. $item->id)}}">Details</a></button>
            </div>
        </div> 
    </div>
    @endforeach
</div>
<div>
    <button class="btn btn-primary m-5 float-end"><a href="/">Back</a></button>
</div>
</div>
<!-- <div class="city-name">
    @foreach ($hotels as $item)
        <h1 class="text-center">{{$item->city->city_name}}</h1>
    @endforeach
</div> -->
    


@endsection
{{--  </body>
</html>
  --}}

