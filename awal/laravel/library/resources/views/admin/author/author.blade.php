@extends('layouts.admin')

@section('title', 'Author')
@section('page-heading', 'Data Author')

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="controller">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button @click.prevent="addAuthor" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Author</button>
    </div>

    @if ($authors->isNotEmpty())
        <table class="table text-left" id="dataTable" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
        </table>
    @else
        <div class="alert alert-primary" role="alert">
            There is no author.
        </div>
    @endif
    <div class="modal fade" id="authorModal" tabindex="-1" aria-labelledby="authorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="authorModalLabel">Form Author</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form @submit.prevent="handleSubmit($event, author.id)" :action="actionUrl" method="post">
        <div class="modal-body">
            @csrf
            <template v-if="editing">
                @method('put')
            </template>
            <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" name="name" :value="author.name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="email" name="email" :value="author.email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number" class="col-form-label">Phone Number:</label>
                <input type="text" name="phone_number" :value="author.phone_number" class="form-control" id="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address" class="col-form-label">Address:</label>
                <textarea class="form-control" name="address" :value="author.address" id="address" required></textarea>
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
        {render: function (index, row, data, meta) {
            return `
                <button onclick="controller.editAuthor(event, ${meta.row})" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></button>
            `
        }, orderable: false},
        {render: function (index, row, data, meta) {
            return `
                <button onclick="controller.deleteAuthor(event, ${meta.row}, ${data.id})" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></button>
            `
        }, orderable: false, class: 'text-center'}
    ]

    var controller = new Vue({
        el: '#controller',
        data: {
            authors: [],
            author: {},
            actionUrl: '{{ url('authors') }}',
            apiUrl: '{{ url('api/authors') }}',
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
                    _this.authors = _this.table.ajax.json().data
                })
            },
            addAuthor() {
                this.author = {}
                this.editing = false
                $('#authorModal').modal('show')
            },
            editAuthor(event, row) {
                this.editing = true
                this.author = this.authors[row]
                $('#authorModal').modal('show')
            },
            deleteAuthor(event, row, id) {
                this.actionUrl = '{{ url('authors') }}' + '/' + id
                const authorName = this.authors[row].name
                if (confirm(`Are you sure want to delete this author with name ${authorName}`)) {
                    axios.post(this.actionUrl, {_method: "delete"})
                        .then(response => this.getResults())
                }
            },
            handleSubmit(event, id) {
                const _this = this
                this.actionUrl = !this.editing ? '{{ url('authors') }}' : '{{ url('authors') }}' + '/' + id
                axios.post(this.actionUrl, new FormData($(event.target)[0]))
                    .then(response => {
                        $('#authorModal').modal('hide')
                        _this.table.ajax.reload()
                    })
            }
        },
    })
</script>
@endsection