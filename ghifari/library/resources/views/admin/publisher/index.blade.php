@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Data Publisher</h3>
    </div>

    <div class="card-body p-0">
    <table class="table table-striped">
    <thead>
    <tr>
    <th style="width: 10px">#</th>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>Email</th>
    <th>Created at</th>
    <th>Action</th>


    </tr>
    </thead>
    <tbody>

        @foreach ($publishers as $key => $publisher)

        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $publisher -> name }}</td>
            <td>{{ $publisher -> phone_number }}</td>
            <td>{{ $publisher -> address}}</td>
            <td>{{ $publisher -> email}}</td>
            <td>{{ $publisher -> created_at}}</td>
            <td class="text-center">
                <a href="{{ url ('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="POST">
                   <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure')">
                   @method('delete')
                   @csrf


        </tr>
        @endforeach



    </tbody>
    </table>
    </div>

    </div>

@endsection
