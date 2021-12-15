@extends('layouts.admin')
@section('header', 'Author')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('authors.create') }}" class="btn btn-primary pull-right">Create New Author</a>
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
                    @foreach ($authors as $key => $author)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone_number }}</td>
                            <td>{{ $author->address }}</td>
                            <td class="text-center">{{ count($author->books) }}</td>
                            <td class="text-center">{{ date('d M Y', strtotime($author->created_at)) }}</td>
                            <td>
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
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
