@extends('layouts.admin')

@section('title', 'Publisher')
@section('page-heading', 'Data Publisher')
@section('create-button')
    <a href="{{ route('publishers.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Publisher</a>
@endsection

@section('content')
@if ($publishers->isNotEmpty())
    <div class="table-responsive">
        <table class="table text-left">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Publisher Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Books</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $key => $publisher)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->email }}</td>
                        <td>{{ $publisher->phone_number }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td>{{ $publisher->books->count() }}</td>
                        <td><a href="{{ route('publishers.edit', $publisher->id) }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a></td>
                        <td>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="post" onSubmit="return confirm('Are you sure want to delete this publisher with name {{ $publisher->name }}?')">
                                @csrf
                                @method('delete')

                                <button type="submit" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-trash fa-sm text-white-50"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-primary" role="alert">
        There is no publisher.
    </div>
@endif
@endsection