@extends('layouts.admin')

@section('title', 'Edit Publisher')
@section('page-heading', 'Edit Publisher')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <i class="fas fa-plus"></i> Edit Publisher
                <a href="{{ route('publishers.index') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-backward"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('publishers.update', $publisher->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{ old('name', $publisher->name) }}" class="form-control @error('name') is-invalid @enderror" id="name" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="{{ old('email', $publisher->email) }}" class="form-control @error('email') is-invalid @enderror" id="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" name="phone_number" value="{{ old('phone_number', $publisher->phone_number) }}" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" required>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" value="{{ old('address', $publisher->address) }}" class="form-control @error('address') is-invalid @enderror" id="address" required>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection