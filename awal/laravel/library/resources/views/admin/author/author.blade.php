@extends('layouts.admin')

@section('title', 'Author')
@section('page-heading', 'Data Author')

@section('content')
<div id="author">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button @click.prevent="addAuthor" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Author</button>
    </div>

    @if ($authors->isNotEmpty())
        <div class="table-responsive">
            <table class="table text-left">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Total Books</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $key => $author)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone_number }}</td>
                            <td>{{ $author->address }}</td>
                            <td>{{ $author->books->count() }}</td>
                            <td><button @click.prevent="editAuthor({{ $author }})" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></button></td>
                            <td><button @click.prevent="deleteAuthor({{ $author }})" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
        <form :action="actionUrl" method="post">
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
<script>
    var app = new Vue({
        el: '#author',
        data: {
            author: {},
            actionUrl: '{{ route('authors.store') }}',
            editing: false
        },
        methods: {
            addAuthor() {
                this.author = {}
                this.editing = false
                $('#authorModal').modal('show')
            },
            editAuthor(author) {
                this.editing = true
                this.author = author
                this.actionUrl = '{{ url('authors') }}' + '/' + author.id
                $('#authorModal').modal('show')
            },
            deleteAuthor(author) {
                this.actionUrl = '{{ url('authors') }}' + '/' + author.id
                const authorName = author.name
                if (confirm(`Are you sure want to delete this author with name ${authorName}`)) {
                    axios.post(this.actionUrl, {_method: "delete"})
                        .then(response => location.reload())
                }
            }
        }
    })
</script>
@endsection