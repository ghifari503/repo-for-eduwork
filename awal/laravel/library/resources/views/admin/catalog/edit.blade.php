@extends('layouts.admin')

@section('title', 'Edit Catalog')
@section('page-heading', 'Edit Catalog')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <i class="fas fa-plus"></i> Edit Catalog
                <a href="{{ url('catalogs') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-backward"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url("catalogs/$catalog->id") }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{ old('name', $catalog->name) }}" class="form-control @error('name') is-invalid @enderror" id="name" required>

                                @error('name')
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