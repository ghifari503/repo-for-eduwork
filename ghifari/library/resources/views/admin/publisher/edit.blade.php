@extends('layouts.admin')
@section('header', 'publisher')
@section('content')
<div class="row">

    <div class="col-md-6">

    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit publisher</h3>
    </div>


    <form action="{{url('publishers/' .$publisher->id) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
    <div class="card-body">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Enter Name" required="" value="{{ $publisher->name }}">
    <label>phone number</label>
    <input type="number" name="number" class="form-control"  placeholder="Enter number" required="" value="{{ $publisher->phone_number }}">
    <label>Address</label>
    <input type="text" name="name" class="form-control"  placeholder="Enter Name" required="" value="{{ $publisher->address }}">
    <label>Email</label>
    <input type="text" name="name" class="form-control"  placeholder="Enter email" required="" value="{{ $publisher->email }}">
    </div>

    </div>
    </div>
    </div>
    </div>

    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    </div>
@endsection
