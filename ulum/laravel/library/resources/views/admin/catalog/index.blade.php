@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th class="text-center">Total books</th>
                        <th class="text-center">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catalogs as $key => $catalog)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $catalog->name }}</td>
                            <td>{{ count($catalog->books) }}</td>
                            <td class="text-center">{{ date('d M Y', strtotime($catalog->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
