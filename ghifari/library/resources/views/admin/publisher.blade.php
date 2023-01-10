@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')

@endsection

@section('content')
<div id="controller">
@section('content')
<div class="card">
    <div class="card-header">
        <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
    </div>

    <div class="card-body p-0">
    <table class="table table-striped">
    <thead>
    <tr>
    <th style="width: 10px">#</th>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>Email</th>


    </tr>
    </thead>
    <tbody>

        @foreach ($publishers as $key => $publisher)

        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $publisher -> name }}</td>
            <td>{{ $publisher -> phone_number }}</td>
            <td>{{ $publisher -> address}}</td>
            <td>{{ $publisher -> email}}</td>
            <td class="text-right">
                <a href="#" @click="editData('{{ $publisher }}')" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" @click="deleteData({{ $publisher->id }})"  class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach



    </tbody>
    </table>
    </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" :action="actionUrl" autocomplete="off">
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
            <input type="text" name="name" class="form-control" :value="data.name" required="">
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone_number" class="form-control" :value="data.phone_number" required="">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" :value="data.address" required="">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" :value="data.email" required="">
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


@endsection

@section('js')
    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data : {},
                actionUrl : '{{ url('publishers') }}',
                editStatus : false

            },
            mounted: function () {

            },
            methods: {
                addData(){
                    this.data = {};
                    this.editStatus = false;
                    this.actionUrl = '{{ url('publishers') }}';
                    $('#modal-default').modal();

                },
                editData(data){
                    this.data = data;
                    this.editStatus = true;
                    this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
                    $('#modal-default').modal();

                },
                deleteData(id){
                    this.actionUrl = '{{ url('publishers') }}'+'/'+id;
                    if (confirm("Are you sure?")) {
                        axios.post(this.actionUrl, {__method: 'DELETED'}).then(response=>{
                            location.reload();
                        });
                    }

                }

            }
        });
</script>
@endsection
