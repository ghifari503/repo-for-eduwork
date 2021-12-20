@extends('layouts.admin')
@section('header','Publisher')

@section('css')
    <!-- dataTables -->
    <link rel="stylesheet" href="{{ asset('assetes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetes/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
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
                    <a href="#" @click="addData()"
                        class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="publisher">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th style="width: 80px">Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th style="width: 150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $publishers as $key => $publisher)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$publisher->name}}</td>
                                <td>{{$publisher->email}}</td>
                                <td>{{$publisher->phone_number}}</td>
                                <td>{{$publisher->address}}</td>
                                <td>
                                    {{ date('d M Y - H:i:s', strtotime($publisher->created_at)) }}
                                </td>
                                <td>
                                    <div class="row justify-content-center">
                                        <a href="#" @click="editData({{$publisher}})" class="btn btn-warning btn-sm">Edit</a>
                                        &nbsp;
                                    <a href="#" @click="deleteData({{$publisher->id}})" class="btn btn-danger btn-sm">Delete</a>
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Author</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" :value="data.name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" :value="data.email" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" :value="data.address" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
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
<script type="text/javascript"> 
    $(function () {
    $("#publisher").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#publisher_wrapper .col-md-6:eq(0)');
  });
</script>
    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('publishers') }}',
                editStatus: false
            },
            mounted: function() {
                
            },
            methods: {
                addData(){
                    this.data = {};
                    this.actionUrl = '{{ url('publishers') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data){
                    // console.log(data);
                    this.data = data;
                    this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id){
                    // console.log(dataId);
                    this.actionUrl = '{{ url('publishers') }}'+'/'+id;
                    if(confirm("Are you sure?")) {
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                            location.reload();
                        });
                    }
                }
            }
        });

    </script>
@endsection
