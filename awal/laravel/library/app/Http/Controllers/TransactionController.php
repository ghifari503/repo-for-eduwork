<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions.index');
    }

    public function api()
    {
        if (request()->ajax()) {
            $data = Transaction::with('member', 'transactionDetails')
                ->select('transactions.*', DB::raw("SUM(transaction_details.qty) as total_books"), DB::raw("SUM(transaction_details.qty * books.price) as total_cost"))
                ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->groupBy('transaction_details.transaction_id')
                ->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('borrow_date', function($data) {
                    return $data->date_start->format('d F Y');
                })
                ->addColumn('return_date', function($data) {
                    return $data->date_end->format('d F Y');
                })
                ->addColumn('duration', function($data) {
                    return date_diff($data->date_end, $data->date_start)->format('%d days');
                })
                ->addColumn('transaction_status', function($data) {
                    if($data->status == 1){
                        return 'Returned';
                    }else{
                        return 'Borrowed';
                    }
                })
                ->addColumn('total_cost_rupiah', function($data) {
                    return convert_to_rupiah($data->total_cost);
                })
                ->make(true);
        }
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transactions.show', [
            'transaction' => $transaction
        ]);
    }
}
