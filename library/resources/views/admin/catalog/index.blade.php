@extends('layouts.admin')
@section('header','Catalog')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Catalogs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 10px">#</th>
                      <th class="text-left">Name</th>
                      <th>Total Book</th>
                      <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($catalogs as $key => $catalog)
                    <tr class="text-center">
                      <td>{{$key+1}}</td>
                      <td class="text-left">{{$catalog->name}}</td>
                      <td>{{ count($catalog->books)}}</td>
                      <td>
                        {{ date('d M Y - H:i:s', strtotime($catalog->created_at)) }}
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
      </div>
    </section>
@endsection
