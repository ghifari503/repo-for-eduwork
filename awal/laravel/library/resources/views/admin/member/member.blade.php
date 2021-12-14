@extends('layouts.admin')

@section('title', 'Member')
@section('page-heading', 'Data Member')

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="controller">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button @click.prevent="addMember" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Member</button>
    </div>

    @if ($members->isNotEmpty())
        <table class="table text-left" id="dataTable" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Member Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
        </table>
    @else
        <div class="alert alert-primary" role="alert">
            There is no member.
        </div>
    @endif
    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="memberModalLabel">Form Member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form @submit.prevent="handleSubmit($event, member.id)" :action="actionUrl" method="post">
        <div class="modal-body">
            @csrf
            <template v-if="editing">
                @method('put')
            </template>
            <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" name="name" :value="member.name" class="form-control" id="name" required v-model="member.name">
            </div>
            <label>Gender:</label>
            <div class="form-check">
               <input class="form-check-input" type="radio" name="gender" id="M" value="M" :checked="member.gender == 'M'" required v-model="member.gender">
               <label class="form-check-label" for="M">
                  Male
               </label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="radio" name="gender" id="F" value="F" :checked="member.gender == 'F'" required v-model="member.gender">
               <label class="form-check-label" for="F">
                  Female
               </label>
            </div>
            <div class="form-group">
                <label for="phone_number" class="col-form-label">Phone Number:</label>
                <input type="text" name="phone_number" :value="member.phone_number" class="form-control" id="phone_number" required v-model="member.phone_number">
            </div>
            <div class="form-group">
                <label for="address" class="col-form-label">Address:</label>
                <textarea class="form-control" name="address" :value="member.address" id="address" required v-model="member.address"></textarea>
            </div>
            <div class="form-group">
               <label for="email" class="col-form-label">Email:</label>
               <input type="email" name="email" :value="member.email" class="form-control" id="email" required v-model="member.email">
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
        {data: 'showGenderName', orderable: true},
        {data: 'phone_number', orderable: false},
        {data: 'address', orderable: false},
        {data: 'email', orderable: false},
        {render: function (index, row, data, meta) {
            return `
                <button onclick="controller.editMember(event, ${meta.row})" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i></button>
            `
        }, orderable: false},
        {render: function (index, row, data, meta) {
            return `
                <button onclick="controller.deleteMember(event, ${meta.row}, ${data.id})" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></button>
            `
        }, orderable: false, class: 'text-center'}
    ]

    var controller = new Vue({
        el: '#controller',
        data: {
            members: [],
            member: {},
            actionUrl: '{{ url('members') }}',
            apiUrl: '{{ url('api/members') }}',
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
                    _this.members = _this.table.ajax.json().data
                })
            },
            addMember() {
                $('input[name="gender"').prop('checked', false)
                this.member = {}
                this.editing = false
                $('#memberModal').modal('show')
            },
            editMember(event, row) {
                this.editing = true
                this.member = this.members[row]
                $('#memberModal').modal('show')
            },
            deleteMember(event, row, id) {
                this.actionUrl = '{{ url('members') }}' + '/' + id
                const memberName = this.members[row].name
                if (confirm(`Are you sure want to delete this member with name ${memberName}`)) {
                    axios.post(this.actionUrl, {_method: "delete"})
                        .then(response => this.getResults())
                }
            },
            handleSubmit(event, id) {
                const _this = this
                this.actionUrl = !this.editing ? '{{ url('members') }}' : '{{ url('members') }}' + '/' + id
                axios.post(this.actionUrl, new FormData($(event.target)[0]))
                    .then(response => {
                        $('#memberModal').modal('hide')
                        _this.table.ajax.reload()
                    })
            }
        },
    })
</script>
@endsection