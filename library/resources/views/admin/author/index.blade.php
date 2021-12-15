@extends('layouts.admin')
@section('header','Author')

@section('content')
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <a href="{{url('authors/create')}}" class="btn btn-sm btn-primary pull-right">Create New Author</a>
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
                  @foreach( $authors as $key => $author)
                    <tr class="text-center">
                      <td>{{$key+1}}</td>
                      <td class="text-left">{{$author->name}}</td>
                      <td>{{$author->email}}</td>
                      <td>{{$author->phone_number}}</td>
                      <td>{{$author->address}}</td>
                      <td>
                      {{ date('d M Y - H:i:s', strtotime($author->created_at)) }}
                      </td>
                      <td>
                       //
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
