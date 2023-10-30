@extends('Backend.layouts.master')

@section('contant')
        <div>
            <a href="{{url('create')}}" class="btn btn-primary float-end">Add Hotel</a>
        </div>
        <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-primary">
                <th>Hotel Name</th>
                <th>Hotel Address</th>
                <th>Booking Price</th>
                <th>Total Solon</th>
                <th>Total Capacity</th>
                <th>Hotel Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($hotels as $item)
                <tr>
                    <td>{{$item->hotel_name}}</td>
                    <td>{{$item->hotel_address}}</td>
                    <td>{{$item->booking_price}}</td>
                    <td>{{$item->total_solon}}</td>
                    <td>{{$item->total_capacity}}</td>
                    <td>{{$item->hotel_image}}</td>
                    <td><a href="{{url('edit/'. $item->id)}}" class="btn btn-success btn-sm">Edit</a></td>
                    <td><a href="{{url('delete/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    @endsection
