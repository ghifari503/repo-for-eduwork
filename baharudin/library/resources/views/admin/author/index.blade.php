@extends('layouts.admin')

@section('header', 'Author')

@section('content')
	<div class="row">
    	<div class="col-10">
           	<div class="card">
              	<div class="card-header">
                	Author Data

	                <div class="card-tools">
	                  	<div class="input-group input-group-sm" style="width: 150px;">
	                    	<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

	                    	<div class="input-group-append">
	                      		<button type="submit" class="btn btn-default">
	                        		<i class="fas fa-search"></i>
	                      		</button>
	                    	</div>
	                  	</div>
	                </div>
              	</div>
              	<!-- /.card-header -->
              	<div class="card-body table-responsive p-0">
	                <table class="table table-hover">
		                <thead>
		                    <tr>
		                    	<th width="5%">#</th>
		                    	<th class="text-center">Name</th>
		                    	<th class="text-center">Email</th>
		                    	<th class="text-center">Phone Number</th>
		                    	<th class="text-center">Address</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($authors as $key => $author)
		                	<tr>
		                		<td>{{ $key + 1}}</td>
		                		<td>{{ $author->name }}</td>
		                		<td>{{ $author->email }}</td>
		                		<td class="text-center">{{ $author->phone_number }}</td>
		                		<td>{{ $author->address }}</td>
		                	</tr>
		                	@endforeach
		                </tbody>
	                </table>
              	</div>
          	<!-- /.card-body -->
            </div>
        <!-- /.card -->
      	</div>
    </div>
@endsection