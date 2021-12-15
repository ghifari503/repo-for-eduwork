@extends('layouts.admin')
@section('header','Publisher')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('delete'))
        <div class="alert alert-primary alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <a href="{{url('publishers/create')}}" class="btn btn-sm btn-primary pull-right">Create New
                    Publisher</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10px">#</th>
                            <th class="text-left">Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $publishers as $key => $publisher)
                        <tr class="text-center">
                            <td>{{$key+1}}</td>
                            <td class="text-left">{{$publisher->name}}</td>
                            <td>{{$publisher->email}}</td>
                            <td>{{$publisher->phone_number}}</td>
                            <td>{{$publisher->address}}</td>
                            <td>
                                {{ date('d M Y - H:i:s', strtotime($publisher->created_at)) }}
                            </td>
                            <td>
                              <div class="row">
                                <a href="{{ url('publishers/'.$publisher->id.'/edit') }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                    &nbsp;
                                <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="post">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"
                                        onclick="return confirm('masa iya?')">
                                    @method('delete')
                                    @csrf
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
