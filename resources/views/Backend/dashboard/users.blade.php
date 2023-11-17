@extends('Backend.layouts.master')

@section('contant')
        <!-- <div>
            <a href="{{url('create')}}" class="btn btn-primary float-end">Add Hotel</a>
        </div> -->
        <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-primary">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Address</th>
                <th>User Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($users as $index => $item)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->mobile_number}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                        @if ($item->status == 0) <span class="badge bg-info text-dark">Customer</span>
                        @elseif ($item->status == 1) <span class="badge text-light bg-success">Hotel Owner</span>
                        @else <span class="badge bg-danger text-light">Admin</span>
                        @endif

                    </td>
                    <td><span class="badge text-light bg-success">Active</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
