@extends('layouts.admin')
@section('title', 'Transaction Detail')

@section('content')
<div id="controller">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-primary">
                    <h4>Transaction Detail</h1>
                </div>
                <div class="card card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Member Name :</th>
                            <td>{{ $transaction->member->name }}</td>
                        </tr>
                        <tr>
                            <th>Loan Date :</th>
                            <td>{{ $transaction->date_start }}</td>
                        </tr>
                        <tr>
                            <th>Book(s) :</th>
                            <td>
                                @foreach ($transaction->TransactionDetails as $transactionDetail)
                                <ul>
                                    <li>{{ $transactionDetail->book->title }}</li>
                                </ul>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Status :</th>
                            <td>{{ $transaction->status == 1 ? 'Returned' : 'On Loan' }}</td>
                        </tr>
                    </table>
                </div>
                <!-- Back link -->
                <a href="{{ url('transactions') }}" class="btn btn-primary w-25 float-left">Go back</a>
            </div>
        </div>
    </div>
</div>
@endsection