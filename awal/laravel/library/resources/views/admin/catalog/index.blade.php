@extends('layouts.admin')

@section('title', 'Catalog')
@section('page-heading', 'Data Catalog')
@section('create-button')
    <a href="{{ url('catalogs/create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Catalog</a>
@endsection

@section('content')
@if ($catalogs->isNotEmpty())
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" class="text-left">Catalog Name</th>
                    <th scope="col">Total Books</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catalogs as $key => $catalog)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td class="text-left">{{ $catalog->name }}</td>
                        <td>{{ $catalog->books->count() }}</td>
                        <td>{{ convert_date($catalog->created_at) }}</td>
                        <td><a href="{{ url("catalogs/$catalog->id/edit") }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></a></td>
                        <td>
                            <form action="{{ url("catalogs/$catalog->id") }}" method="post" onSubmit="return confirm('Are you sure want to delete this catalog with name {{ $catalog->name }}?')">
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
        There is no catalog.
    </div>
@endif
@endsection