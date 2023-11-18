@extends('Backend.layouts.master')

@section('contant')
<?php 
  $images = json_decode($booking->hotel->hotel_images);
  $servicePrices = $booking->services->pluck('price');
  $total = 0;
  foreach($servicePrices as $index => $price) {
      if ($index == 0) $total = $total + $booking->guests_count * $price;
      else $total = $total + $price;
  }
?>
<div class="container">
@if(in_array(Auth::user()->user_type, [1,2]))
<form action="{{ url('booking-status/'.$booking->id) }}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate="" id="hotel-form">
  @csrf
  <div class="row p-5 my-5 shadow-lg" style="background:white;border-radius:0.5rem">
    <div class="">
        <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" {{$booking->status == 0 ? 'checked': ''}}>
      <label class="form-check-label" for="inlineRadio1">Pending</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1" {{$booking->status == 1 ? 'checked': ''}}>
      <label class="form-check-label" for="inlineRadio2">Approved</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="2" {{$booking->status == 2 ? 'checked': ''}}>
      <label class="form-check-label" for="inlineRadio3">Declined</label>
    </div>  
    </div>
    <div class="mt-3">
      <label for="description" class="form-label">Status Reason</label>
      <textarea class="form-control" id="reason" name="reason" rows="3">{{$booking->reason}}</textarea>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary btn-lg mt-5">Submit</button>
    </div>
  </div>
</form>
@endif
<div class="row featurette p-5 my-5 shadow-lg rounded-3 bg-white" style="margin-top:5rem">
<h2 class="text-center mt-3 mb-5">Hotel Details</h2>

  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">{{$booking->hotel->hotel_name}}</h2>
    <p>Address: <span>{{$booking->hotel->city->city_name}}</span><span> - {{$booking->hotel->hotel_address}}</span></p>
    <p>Booker Name: {{$booking->booker->name}}</p>
    <p>Booking Date: {{$booking->booking_date}}</p>
    <p>Guests Count: {{$booking->guests_count}}</p>
    <p>Booking Total: {{$total}} Afg</p>
    <p>Status: 
      @if ($booking->status == 0) <span class="badge bg-info text-dark">Pending</span>
      @elseif ($booking->status == 1) <span class="badge text-light bg-success">Approved</span>
      @else <span class="badge bg-danger text-light">Rejected</span>
      @endif
    </p>
    <p class="lead">{{$booking->comment}}</p>

  </div>
  <div class="col-md-5">
    <img class="rounded-3 shadow-sm" src="{{asset(Storage::url($images[0]))}}" width="500px" height="500px"/>
  </div>
</div>

<div class="album row p-5 my-5 shadow-lg rounded-3 bg-white">
        <div class="container">
        <h2 class="text-center mt-3 mb-5">Booking Salons</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($booking->salons as $salon)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="shadow-sm" src="{{asset(Storage::url(json_decode($salon->photos)[0]))}}" width="100%" height="225"/>
                            <div class="card-body">
                                <h2>{{$salon->name}}</h2>
                                <p>Capacity: {{$salon->max_guests_capacity}}</p>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <!-- <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small>
                                </div> -->
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
  </div>

  <div class="album row p-5 my-5 shadow-lg rounded-3 bg-white">
        <div class="container">
        <h2 class="text-center mt-3 mb-5">Booking Services</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($booking->services as $service)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{asset(Storage::url(json_decode($service->photos)[0]))}}" width="100%" height="225"/>
                            <div class="card-body">
                                <h2>{{$service->name}}</h2>
                                <p>Price: {{$service->price}} Afg</p>
                                <p class="card-text">{{$service->description}}</p>
                                <div class="">
                                    @foreach($service->serviceItems as $item)
                                    <span class="badge bg-light-subtle border border-light-subtle text-light-emphasis rounded-pill" style="background-color:#343a40 !important;color:#f8f9fa !important;border-color:#495057 !important;border: 1px solid #495057 !important;">{{$item->name}}</span>
                                    @endforeach
                                    <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-body-secondary">9 mins</small> -->
                                </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
  </div>
</div>
<script>
    $(document).ready(function() { 
        $(function() { 
            $( "#my_date_picker" ).datepicker(); 
        }); 
    }) 
</script>
@endsection
