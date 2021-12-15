@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('publishers.create') }}" class="btn btn-primary pull-right">Create New Publisher</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Phone Number</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Total books</th>
                        <th class="text-center">Created at</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $key => $publisher)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->email }}</td>
                            <td>{{ $publisher->phone_number }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td class="text-center">{{ count($publisher->books) }}</td>
                            <td class="text-center">{{ date('d M Y', strtotime($publisher->created_at)) }}</td>
                            <td>
                                <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')"
                                        value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
