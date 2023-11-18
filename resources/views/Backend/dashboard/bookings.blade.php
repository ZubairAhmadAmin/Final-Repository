@extends('Backend.layouts.master')

@section('contant')
        <!-- <div>
            <a href="{{url('create')}}" class="btn btn-primary float-end">Add Hotel</a>
        </div> -->
        <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-primary">
                <th>#</th>
                <th>Hotel Name</th>
                <th>Booker</th>
                <th>Booking Date</th>
                <th>Guests Count</th>
                <th>Booked Salons</th>
                <th>Booked Services</th>
                <th>Booking Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($bookings as $index => $item)
                <?php 
                    $servicePrices = $item->services->pluck('price');
                    $total = 0;
                    foreach($servicePrices as $index => $price) {
                        if ($index == 0) $total = $total + $item->guests_count * $price;
                        else $total = $total + $price;
                    }
                ?>
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$item->hotel->hotel_name}}</td>
                    <td>{{$item->booker->name}}</td>
                    <td>{{$item->booking_date}}</td>
                    <td>{{$item->guests_count}}</td>
                    <td>{{implode(',', $item->salons->pluck(['name'])->toArray())}}</td>
                    <td>{{implode(',', $item->services->pluck(['name'])->toArray())}}</td>
                    <td>{{$total}} Afg</td>
                    <td>
                        @if ($item->status == 0) <span class="badge bg-info text-dark">Pending</span>
                        @elseif ($item->status == 1) <span class="badge text-light bg-success">Approved</span>
                        @else <span class="badge bg-danger text-light">Rejected</span>
                        @endif

                    </td>
                    <td><a href="{{route('showBooking', [$item->id])}}" class="btn btn-success btn-sm">View</a></td>
                    @if(Auth::user()->user_type == 2 || Auth::user() == $item->booker)
                        <td><a href="{{route('editBooking', [$item->id])}}" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="{{route('deleteBooking',[$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
