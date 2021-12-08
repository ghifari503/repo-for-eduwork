@extends('layouts.admin')

@section('title', 'Catalog')
@section('page-heading', 'Catalog')

@section('content')
@if ($catalogs->isNotEmpty())
    <table class="table text-center">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" class="text-left">Catalog Name</th>
                <th scope="col">Total Books</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catalogs as $key => $catalog)
                 <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td class="text-left">{{ $catalog->name }}</td>
                    <td>{{ $catalog->books->count() }}</td>
                    <td>{{ $catalog->created_at->format('d M Y - H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-primary" role="alert">
        There is no catalog.
    </div>
@endif
@endsection