@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Data Catalog</h3>
    </div>

    <div class="card-body p-0">
    <table class="table table-striped">
    <thead>
    <tr>
    <th style="width: 10px">#</th>
    <th>Name</th>
    <th>Total Book</th>
    <th>Created At</th>

    </tr>
    </thead>
    <tbody>

        @foreach ($catalogs as $key => $catalog)

        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $catalog -> name }}</td>
            <td>{{ count($catalog -> books) }}</td>
            <td>{{ $catalog -> created_at}}</td>


        </tr>
        @endforeach



    </tbody>
    </table>
    </div>

    </div>

@endsection
