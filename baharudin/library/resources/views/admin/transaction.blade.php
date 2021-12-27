@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="#" class="btn btn-sm btn-primary pull-right">Create New Transaction</a>
					<!-- Loan Date Filter -->
                	<div class="card-tools">
                        <select class="form-control" name="loan_date">
                          <option value="">Loan Date Filter</option>
                          <option value="">Date</option>
                        </select>
                	</div>
                	<!-- Status Filter -->
                	<div class="card-tools mr-3">
                        <select class="form-control" name="status">
                          <option value="">Status Filter</option>
                          <option value="">On Loan</option>
                          <option value="">Returned</option>
                        </select>
                	</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body table-responsive">
	                <table id="datatable" class="table table-hover table-bordered">
		                <thead>
		                    <tr>
		                    	<th class="text-center" width="5%">#</th>
		                    	<th class="text-center">Loan Date</th>
		                    	<th class="text-center">Return Date</th>
		                    	<th class="text-center">Member Name</th>
		                    	<th class="text-center">Loan Duration (day)</th>
		                    	<th class="text-center">Total Books</th>
		                    	<th class="text-center">Total Costs</th>
		                    	<th class="text-center">Status</th>
		                    	<th class="text-center">Action</th>
		                    </tr>
		                </thead>
	                </table>
	          	</div>
	          	<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
</div>
@endsection

@section('js')
<!-- Datatables & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
	var actionUrl = '{{ url('transactions') }}';
	var apiUrl = '{{ url('api/transactions') }}';

	var columns = [
		{
			data: 'DT_RowIndex',
			class: 'text-center',
			orderable: true
		},
		{
			data: 'date_start',
			class: 'text-center', 
			orderable: true
		},
		{
			data: 'date_end', 
			class: 'text-center', 
			orderable: true
		},
		{
			data: 'name',
			class: 'text-left',
			orderable: true
		},
		{
			data: 'duration',
			class: 'text-center',
			orderable: true
		},
		{
			data: 'total_transactions',
			class: 'text-center',
			orderable: false
		},
		{
			data: 'total_costs',
			class: 'text-center',
			orderable: false
		},
		{
			data: 'status',
			class: 'text-center',
			orderable: true
		},
		{
			render: function(index, row, data, meta) {
			return `
			<a href="#" class="btn btn-success btn-sm" onclick="controller.editData()">
				Detail
			</a>
			<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
				Edit
			</a>
			<a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
				Delete
			</a>
			`
			},
			orderable: false,
			width: '200px',
			class: 'text-center'
		},
	];
</script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection