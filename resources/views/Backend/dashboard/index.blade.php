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
                <th>Hotel Owner</th>
                <th>Email</th>
                <th>Mobile NUmber</th>
                <th>Total Salons</th>
                <th>Total Capacity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($hotels as $item)
                <tr>
                    <td>{{$item->hotel_name}}</td>
                    <td>{{$item->hotel_address}}</td>
                    <td>{{$item->owner->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->mobile_number}}</td>
                    <td>{{$item->total_salons}}</td>
                    <td>{{$item->total_capacity}}</td>
                    <td><a href="{{url('show-hotel/'. $item->id)}}" class="btn btn-success btn-sm">View</a></td>
                    <td><a href="{{url('edit/'. $item->id)}}" class="btn btn-success btn-sm">Edit</a></td>
                    <td><a href="{{url('delete/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    @endsection
