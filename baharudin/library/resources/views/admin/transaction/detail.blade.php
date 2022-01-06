@extends('layouts.admin')
@section('title', 'Transaction Detail')

@section('content')
<div id="controller" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Transaction Detail</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            Member Name
                        </div>
                        <div class="col-1 w-10">
                            :
                        </div>
                        <div class="col-7">
                            {{ $transaction->member->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            Loan Date
                        </div>
                        <div class="col-1 w-10">
                            :
                        </div>
                        <div class="col-7">
                            {{ dateFormat($transaction->date_start) }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            Book(s)
                        </div>
                        <div class="col-1 w-10">
                            :
                        </div>
                        <div class="col-7">
                            @foreach ($transaction->TransactionDetails as $transactionDetail)
                                <ul class="list-unstyled">
                                    <li">{{ $transactionDetail->book->title }}</li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            Status
                        </div>
                        <div class="col-1 w-10">
                            :
                        </div>
                        <div class="col-7">
                            {{ $transaction->status == 1 ? 'Returned' : 'On Loan' }}
                        </div>
                    </div>
            </div>
                <div class="card-footer">
                    <!-- Go back link -->
                    <a href="{{ url('transactions') }}" class="btn btn-default float-right">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection