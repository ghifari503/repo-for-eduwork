@extends('layouts.admin')

@section('title', 'Publisher')
@section('page-heading', 'Data Publisher')

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="publisher">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button @click.prevent="addPublisher" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Publisher</button>
    </div>

    @if ($publishers->isNotEmpty())
        <div class="table-responsive">
            <table class="table text-left" id="dataTable">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col">Publisher Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Total Books</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $key => $publisher)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->email }}</td>
                            <td>{{ $publisher->phone_number }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>{{ $publisher->books->count() }}</td>
                            <td><button @click.prevent="editPublisher({{ $publisher }})" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></button></td>
                            <td><button @click.prevent="deletePublisher({{ $publisher }})" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
        <form :action="actionUrl" method="post">
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
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<script>
    var app = new Vue({
        el: '#publisher',
        data: {
            publisher: {},
            actionUrl: '{{ route('publishers.store') }}',
            editing: false
        },
        methods: {
            addPublisher() {
                this.publisher = {}
                this.editing = false
                $('#publisherModal').modal('show')
            },
            editPublisher(publisher) {
                this.editing = true
                this.publisher = publisher
                this.actionUrl = '{{ url('publishers') }}' + '/' + publisher.id
                $('#publisherModal').modal('show')
            },
            deletePublisher(publisher) {
                this.actionUrl = '{{ url('publishers') }}' + '/' + publisher.id
                const publisherName = publisher.name
                if (confirm(`Are you sure want to delete this publisher with name ${publisherName}`)) {
                    axios.post(this.actionUrl, {_method: "delete"})
                        .then(response => location.reload())
                }
            }
        }
    })
</script>
@endsection