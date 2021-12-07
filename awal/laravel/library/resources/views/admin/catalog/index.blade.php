@extends('layouts.admin')

@section('title', 'Catalog')
@section('page-heading', 'Catalog')

@section('content')
    <table class="table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col">Catalog Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Children Book</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>English Book</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Cooking Book</td>
            </tr>
        </tbody>
    </table>
@endsection