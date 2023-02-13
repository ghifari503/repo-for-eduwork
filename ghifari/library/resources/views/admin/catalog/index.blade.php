@extends('layouts.admin')
@section('header', 'catalog')

@section('content')
@can('index catalog')


<div class="card">
    <div class="card-header">
    <a href="{{ url('catalogs/create') }}" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
    </div>

    <div class="card-body p-0">
    <table class="table table-striped">
    <thead>
    <tr class="text-center">
    <th style="width: 10px">#</th>
    <th>Name</th>
    <th>Total Book</th>
    <th>Created At</th>
    <th>Action</th>

    </tr>
    </thead>
    <tbody>

        @foreach ($catalogs as $key => $catalog)

        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $catalog -> name }}</td>
            <td class="text-center">{{ count($catalog -> books) }}</td>
            <td class="text-center">{{ convert_date($catalog->created_at)}}</td>
            <td class="text-center">
                <a href="{{ url ('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="POST">
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"
                        onclick="return confirm('Are you sure you want to delete this catalog?')">
                    @method('delete')
                    @csrf
               </td>


        </tr>
        @endforeach



    </tbody>
</table>
</div>

</div>
@endcan
@endsection
