@extends('layouts.admin')

@section('title', 'Author')
@section('page-heading', 'Data Author')

@section('content')
@if ($authors->isNotEmpty())
    <div class="table-responsive">
        <table class="table text-left">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Books</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $key => $author)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->email }}</td>
                        <td>{{ $author->phone_number }}</td>
                        <td>{{ $author->address }}</td>
                        <td>{{ $author->books->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-primary" role="alert">
        There is no author.
    </div>
@endif
@endsection