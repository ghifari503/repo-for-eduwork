@extends('layouts.admin')
@section('header', 'Create New Publisher')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    Create New Publisher
                </div>
                <div class="card-body">
                    <form action="{{ route('publishers.store') }}" method="POST">
                        @csrf
                        <label for="name">Publisher Name : </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required />
                        @error('name')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror

                        <label for="email" class="mt-3">Email : </label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required />
                        @error('email')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror

                        <label for="phone_number" class="mt-3">Phone Number : </label>
                        <input type="number" name="phone_number" id="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ old('phone_number') }}" required />
                        @error('phone_number')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror

                        <label for="address" class="mt-3">Address : </label>
                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                            required>{{ old('address') }}</textarea>
                        @error('address')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
