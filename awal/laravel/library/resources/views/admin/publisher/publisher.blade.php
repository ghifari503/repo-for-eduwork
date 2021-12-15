@extends('layouts.admin')

@section('title', 'Publisher')
@section('page-heading', 'Data Publisher')

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="controller">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button @click.prevent="addPublisher" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Publisher</button>
    </div>

    @if ($publishers->isNotEmpty())
        <table class="table text-left" id="dataTable" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Publisher Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
        </table>
    @else
        <div class="alert alert-primary" role="alert">
            There is no publisher.
        </div>
    @endif
    <div class="modal fade" id="publisherModal" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="publisherModalLabel">Form Publisher</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form @submit.prevent="handleSubmit($event, publisher.id)" :action="actionUrl" method="post">
        <div class="modal-body">
            @csrf
            <template v-if="editing">
                @method('put')
            </template>
            <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" name="name" :value="publisher.name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="email" name="email" :value="publisher.email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number" class="col-form-label">Phone Number:</label>
                <input type="text" name="phone_number" :value="publisher.phone_number" class="form-control" id="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address" class="col-form-label">Address:</label>
                <textarea class="form-control" name="address" :value="publisher.address" id="address" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    const columns = [
        {data: 'DT_RowIndex', orderable: true},
        {data: 'name', orderable: true},
        {data: 'email', orderable: false},
        {data: 'phone_number', orderable: false},
        {data: 'address', orderable: false},
        {data: 'date_added', orderable: false},
        {render: function (index, row, data, meta) {
            return `
                <button onclick="controller.editPublisher(event, ${meta.row})" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></button>
            `
        }, orderable: false},
        {render: function (index, row, data, meta) {
            return `
                <button onclick="controller.deletePublisher(event, ${meta.row}, ${data.id})" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></button>
            `
        }, orderable: false, class: 'text-center'}
    ]

    var controller = new Vue({
        el: '#controller',
        data: {
            publishers: [],
            publisher: {},
            actionUrl: '{{ url('publishers') }}',
            apiUrl: '{{ url('api/publishers') }}',
            editing: false
        },
        mounted() {
            this.getResults()
        },
        methods: {
            getResults() {
                const _this = this
                _this.table = $('#dataTable').DataTable({
                    "scrollX": true,
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    ajax: {
                        url: _this.apiUrl,
                        type: 'get'
                    },
                    columns
                }).on('xhr', function () {
                    _this.publishers = _this.table.ajax.json().data
                })
            },
            addPublisher() {
                this.publisher = {}
                this.editing = false
                $('#publisherModal').modal('show')
            },
            editPublisher(event, row) {
                this.editing = true
                this.publisher = this.publishers[row]
                $('#publisherModal').modal('show')
            },
            deletePublisher(event, row, id) {
                this.actionUrl = '{{ url('publishers') }}' + '/' + id
                const publisherName = this.publishers[row].name
                if (confirm(`Are you sure want to delete this publisher with name ${publisherName}`)) {
                    axios.post(this.actionUrl, {_method: "delete"})
                        .then(response => this.getResults())
                }
            },
            handleSubmit(event, id) {
                const _this = this
                this.actionUrl = !this.editing ? '{{ url('publishers') }}' : '{{ url('publishers') }}' + '/' + id
                axios.post(this.actionUrl, new FormData($(event.target)[0]))
                    .then(response => {
                        $('#publisherModal').modal('hide')
                        _this.table.ajax.reload()
                    })
            }
        },
    })
</script>
@endsection