@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Datatables -->

@endsection

@section('content')

<div id="controller">
    <div class="card">
        <div class="card-header">
            <a href="#" @click="addData()" class="btn btn-primary">+ Publisher</a>
        </div>

        <div class="card-body p-0">
        <table class="table table-striped" id="dataTable">
        <thead>
        <tr>
        <th style="width: 10px">#</th>
        <th >Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
        </thead>
        </table>
        </div>




        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
            <div class="modal-content">
            <form :action="actionUrl" method="POST" @submit="submitForm($event, data.id)">
            <div class="modal-header">
            <h4 class="modal-title">Publisher</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @csrf

                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" :value="data.name" required>
                </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone_number" class="form-control" :value="data.phone_number" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" :value="data.address" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" :value="data.email" required>
            </div>

            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('js')
<!-- Datatables -->
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
      $("#publisherTable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>


    <script type="text/javascript">
        var actionUrl = '{{ url('publishers') }}';
	    var apiUrl = '{{ url('api/publishers') }}';

    var columns = [{
            data: 'DT_RowIndex',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'name',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'email',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'phone_number',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'address',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
                return `
                    <a href="#" class="btn btn-info" onclick="controller.editData(event, ${meta.row})">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger" onclick="controller.deleteData(event, ${data.id})">
                        Delete
                    </a>
            `
            },
            orderable: false,
            width: '200px',
            class: 'text-center'
        }
    ]
    var controller = new Vue({
        el: '#controller',
        data: {
            datas: [],
            data: {},
            anggota: {},
            actionUrl,
            apiUrl,
            info: '',
            editStatus: false,
        },
        mounted: function() {
            this.datatable()
        },
        methods: {
            datatable() {
                const _this = this
                _this.table = $('#dataTable').DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: 'GET'
                    },
                    columns
                }).on('xhr', function() {
                    _this.datas = _this.table.ajax.json().data;
                })
            },
            addData() {
                this.editStatus = false;
                this.info = 'Create';
                this.data = {};
                $('#modal-default').modal();
            },
            editData(event, row) {
                this.data = this.datas[row];
                this.editStatus = true;
                this.info = 'Update';
                $('#modal-default').modal();
            },
            deleteData(event, id) {
                if (confirm("Are You Sure ?")) {
                    $(event.target).parents('tr').remove();
                    axios.post(this.actionUrl + '/' + id, {
                        _method: 'DELETE'
                    }).then(response => {
                        alert('Data has been removed')
                    });
                }
            },
            submitForm(event, id) {
                event.preventDefault()
                const _this = this
                var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide')
                    _this.table.ajax.reload()
                })
            }
        }
    })
</script>

@endsection
