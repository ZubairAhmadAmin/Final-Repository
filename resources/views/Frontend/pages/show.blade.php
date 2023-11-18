@extends('Frontend.layouts.app')

@section('style')

<div class="container">
<?php $images = json_decode($hotel->hotel_images); ?>
@if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
<div class="d-flex justify-content-end pt-5" style="margin-bottom:5rem">
    <a href="{{url('login')}}" class="btn btn-primary px-5" type="button" style="float:right">
      Book Hotel
</a>
</div>

<div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
      </div>
      <div class="carousel-inner">
        @foreach($images as $index => $image)
            <div class="carousel-item {{$index == 0 ? 'active' : ''}}">
                <img src="{{asset(Storage::url($image))}}" style="width:100%;height:600px"/>
            </div>
        @endforeach
        <!-- <div class="carousel-item">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#666"></rect><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
        </div> -->
        <!-- <div class="carousel-item active">
          <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#555"></rect><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
        </div> -->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="row featurette p-5 shadow-lg" style="margin-top:3rem;background:white;border-radius:0.5rem">
    <h2 class="text-center mt-3 mb-5">Hotel Details</h2>
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">{{$hotel->hotel_name}}</h2>
        <p>Address: <span>{{$hotel->city->city_name}}</span><span> - {{$hotel->hotel_address}}</span></p>
        <p>Email Address: {{$hotel->email}}</p>
        <p>Mobile Number: {{$hotel->mobile_number}}</p>
        <p>Owner: {{$hotel->owner->name}}</p>
        <p>Total Salons: {{$hotel->total_salons}}</p>
        <p>Total Capacity: {{$hotel->total_capacity}}</p>
        <p class="lead">Details: {{$hotel->description}}</p>

      </div>
      <div class="col-md-5">
        <img class="rounded-3 shadow-sm" src="{{asset(Storage::url($images[0]))}}" width="500px" height="500px"/>
    </div>
    </div>

    <div class="row p-5 my-5 shadow-lg" style="background:white;border-radius:0.5rem">
        <div class="conrainer-fluid">
        <h2 class="text-center mt-3 mb-5">Hotel Salon Details</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-between">
                @foreach($hotel->salons as $salon)
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

  <div class="row album p-5 my-5 shadow-lg" style="background:white;border-radius:0.5rem">
        <div class="container-fluid">
        <h2 class="text-center mt-3 mb-5">Hotel Services</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-between">
                @foreach($hotel->services as $service)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="shadow-sm" src="{{asset(Storage::url(json_decode($service->photos)[0]))}}" width="100%" height="225"/>
                            <div class="card-body">
                                <h2>{{$service->name}}</h2>
                                <p>Price: {{$service->price}}</p>
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

<div class="modal fade" id="bookHotelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form action="{{ route('book-hotel', [$hotel->id]) }}" method="post" class="needs-validation" novalidate="" id="booking-form">
    @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$hotel->hotel_name}} Booking Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="recipient-name" class="col-form-label" >Booking Date:</label>
                    <input type="text" class="form-control" id="my_date_picker" name="booking_date" value="{{ old('booking_date') }}">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="recipient-name" class="col-form-label" >Guests Count:</label>
                    <input type="text" class="form-control" id="guests-number" name="guests_number" value="{{ old('guests_number') }}">
                </div>
            </div>
            <h4>Select Hotel Salons: </h4>
            @foreach($hotel->salons as $salon)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="salons[]" id="inlineCheckbox1" value="{{$salon->id}}">
                    <label class="form-check-label" for="inlineCheckbox1">{{$salon->name}}</label>
                </div>
            @endforeach

            @foreach($hotel->services as $service)
            <div class="col w-50 mt-3">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3 text-center">
          <div class="form-check form-check-inline">
                <input class="form-check-input" name="services[]" type="checkbox" id="inlineCheckbox1" value="{{$service->id}}" style="width:30px;height:30px">
                <label class="form-check-label" for="inlineCheckbox1" style="font-size:20px;margin-left:5px;margin-top:5px">{{$service->name}}</label>
            </div>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$service->price}} Afg</h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li class="mb-2">{{$service->description}}</li>
              @foreach($service->serviceItems as $item)
                <span class="badge bg-light-subtle border border-light-subtle text-light-emphasis rounded-pill" style="background-color:#343a40 !important;color:#f8f9fa !important;border-color:#495057 !important;border: 1px solid #495057 !important;">{{$item->name}}</span>
            @endforeach
            </ul>
            <!-- <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
<label class="btn btn-outline-primary" for="btn-check-outlined">Single toggle</label><br> -->
            <!-- <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button> -->
          </div>
        </div>
      </div>
            @endforeach
                
          <div class="mb-3 col-md-6">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" name="comment" id="message-text">{{ old('comment') }}</textarea>
          </div>
          <div class="mb-3">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>
</div>

<script>
    $(document).ready(function() { 
        $(function() { 
            $( "#my_date_picker" ).datepicker(); 
        });
        
    //     @if (count($errors) > 0)
    // $('#bookHotelModal').modal('show');
@endif
    })
</script>
@endsection