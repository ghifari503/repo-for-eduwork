<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions.index');
    }

    public function api()
    {
        if (request()->ajax()) {
            $data = Transaction::with('member')->latest()->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('borrow_date', function($data) {
                    return $data->date_start->format('d F Y');
                })
                ->addColumn('return_date', function($data) {
                    return $data->date_end->format('d F Y');
                })
                ->addColumn('transaction_status', function($data) {
                    if($data->status == 1){
                        return 'Returned';
                    }else{
                        return 'Borrowed';
                    }
                })
                ->make(true);
        }
    }
}
