@extends('layouts.admin')

@section('title', 'Detail Transaction')
@section('page-heading', 'Detail Transaction')

@section('create-button')
    <a href="{{ route('transactions.index') }}" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Back</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-body">
            <h4>Detail Transaction</h1>
            <table class="table table-bordered">
                <tr>
                    <th>Borrowed/Member Name :</th>
                    <td>{{ $transaction->member->name }}</td>
                </tr>
                <tr>
                    <th>Borrow Date:</th>
                    <td>{{ $transaction->date_start->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Books:</th>
                    <td>
                        @foreach ($transaction->transactionDetails as $transactionDetail)
                        <ul>
                                <li>{{ $transactionDetail->books->title }}</li>
                            </ul>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>{{ $transaction->status == 1 ? 'Returned' : 'Borrowed' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection