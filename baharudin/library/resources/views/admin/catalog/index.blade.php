@extends('layouts.admin')

@section('header', 'Catalog')

@section('content')
	<?php
		$servername = "localhost";
		$database = "library";
		$username = "root";
		$password = "";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);

		// Catalog
		$catalog = mysqli_query($conn, "SELECT * FROM catalogs");
	?>

	<div class="row">
    	<div class="col-12">
           	<div class="card">
              	<div class="card-header">
                	<h3 class="card-title">Responsive Hover Table</h3>

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
	                <table class="table table-hover text-nowrap">
		                <thead>
		                    <tr>
		                    	<th width="5%">ID</th>
		                    	<th>Name</th>
		                    </tr>
		                </thead>
	                  	
						<?php  
					        while($catalog_data = mysqli_fetch_array($catalog)) {         
					            echo "<tr>";
					            echo "<td>".$catalog_data['id']."</td>";
					            echo "<td>".$catalog_data['name']."</td>";  
					            echo "</tr>";        
					        }
						?>
	                </table>
              	</div>
          	<!-- /.card-body -->
            </div>
        <!-- /.card -->
      	</div>
    </div>
@endsection