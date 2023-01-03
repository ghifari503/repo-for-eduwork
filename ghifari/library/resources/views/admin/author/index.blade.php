@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Data author</h3>
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
    


    </tr>
    </thead>
    <tbody>

        @foreach ($authors as $key => $author)

        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $author -> name }}</td>
            <td>{{ $author -> phone_number }}</td>
            <td>{{ $author -> address}}</td>
            <td>{{ $author -> email}}</td>
            <td>{{ $author -> created_at}}</td>
            <td class="text-center">


        </tr>
        @endforeach



    </tbody>
    </table>
    </div>

    </div>

@endsection
