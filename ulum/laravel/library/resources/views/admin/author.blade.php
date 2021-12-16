@extends('layouts.admin')
@section('header', 'Author')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <div id="controller">
        <div class="card">
            <div class="card-header">
                <button @click="addData()" class="btn btn-primary pull-right">Create New
                    Author</button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="authorTable">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Total books</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $key => $author)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->email }}</td>
                                <td>{{ $author->phone_number }}</td>
                                <td>{{ $author->address }}</td>
                                <td class="text-center">{{ count($author->books) }}</td>
                                <td>
                                    <a href="#" @click="editData({{ $author }})" class="btn btn-info">Edit</a>
                                    <a href="#" @click="deleteData({{ $author->id }})" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-default" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form :action="actionUrl" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-text="info + ' Author'"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus" />

                            <label for="name">Author Name : </label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" :value="data.name" required />
                            @error('name')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="email" class="mt-3">Email : </label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" :value="data.email" required />
                            @error('email')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="phone_number" class="mt-3">Phone Number : </label>
                            <input type="number" name="phone_number" id="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror" :value="data.phone_number"
                                required />
                            @error('phone_number')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="address" class="mt-3">Address : </label>
                            <textarea name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" required
                                :value="data.address"></textarea>
                            @error('address')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" v-text="info"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#authorTable").DataTable();
        });
    </script>


    <!-- Vue -->
    <script>
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '',
                editStatus: false,
                info: ''
            },
            methods: {
                addData() {
                    this.actionUrl = '{{ route('authors.store') }}';
                    this.editStatus = false;
                    this.info = 'Create';
                    this.data = {};
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.editStatus = true;
                    this.info = 'Update';
                    this.actionUrl = '{{ route('authors.update', '') }}/' + data.id;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ route('authors.destroy', '') }}/' + id;
                    if (confirm("Are You Sure ?")) {
                        axios.post(this.actionUrl, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        });
                    }
                }
            }
        })
    </script>
@endsection
