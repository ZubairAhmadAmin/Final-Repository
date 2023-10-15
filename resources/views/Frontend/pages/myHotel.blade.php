@extends('Frontend.layouts.app')

@section('style')
    

<div>
    <div class="my-hotel">
        <img class="salon-img" src="{{URL('images/solon.jpg')}}" alt="">
    </div>
    <div style="margin-left: 200px">
        <div class="row">
            <div class="col-4 m-5" >
                <div class="card">
                    <div class="card-header">
                        <h1>Hotel Feature</h1>
                    </div>
                    <div class="card-body">
                        <p>1 :</p>
                        <p>2 :</p>
                        <p>3 :</p>
                        <p>4 :</p>
                    </div>
                </div>
            </div>
            <div class="col-4 m-5">
                <div class="card">
                    <div class="card-header">
                        <h1>Services</h1>
                    </div>
                    <div class="card-body">
                        <p>1 :</p>
                        <p>2 :</p>
                        <p>3 :</p>
                        <p>4 :</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu">
      <img src="{{URL('images/menu.jpg')}}" alt="">
    </div>
    <button class="book-btn float-end"><a href="booking">Book Now</a></button>
    <button class="book-btn"><a href="hotels">Back</a></button>
</div>

@endsection