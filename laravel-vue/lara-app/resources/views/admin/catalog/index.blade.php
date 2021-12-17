@extends('layouts.master')
@section('header','Catalog')
@section('subheader','Index')

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
@endpush

@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <h4 class="card-title">Data Catalog</h4>
              <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Name</th>
                    <th class="text-center">Total Book</th>
                    <th class="text-center">Created At</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($catalogs as $key => $items)
                  <tr>
                    <td class="text-center">{{$key + 1}}</td>
                    <td>{{$items->name}}</td>
                    <td class="text-right">{{count($items->books)}}</td>
                    <td class="text-center">{{date('j F Y', strtotime($items->created_at))}}</td>
                  </tr> 
                  @empty
                  <tr>
                    <td>Data Kosong</td>
                  </tr> 
                  @endforelse 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
      </div>
    </div>
</div> 
@endsection