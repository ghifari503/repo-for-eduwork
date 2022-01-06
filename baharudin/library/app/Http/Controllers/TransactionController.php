<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionStatuses = Transaction::select('status')->distinct()->orderBy('status')->get();

        return view('admin.transaction.index', compact('transactionStatuses'));
    }

    public function api(Request $request)
    {
        $transactions = Transaction::select('transactions.*', 'members.name', DB::raw('DATEDIFF(date_end, date_start) as duration'))
                                    ->join('members', 'members.id', 'transactions.member_id');

        if ($request->status == '0' || $request->status == '1') {
            $transactions = $transactions->where('status', $request->status);
        }

        $transactions = $transactions->get();

        foreach ($transactions as $key => $transaction) {
            $transaction->total_transactions = TransactionDetail::where('transaction_id', $transaction->id)->count();
            $transaction->total_costs = TransactionDetail::select(DB::raw('SUM(transaction_details.qty * books.price) as total_costs'))
                                        ->join('books', 'books.id', 'transaction_details.book_id')
                                        ->where('transaction_id', $transaction->id)
                                        ->first()
                                        ->total_costs;
        }

        $datatables = datatables()->of($transactions)
                        ->addColumn('status', function ($transactions) {
                            if ($transactions->status == 1) {
                                return 'Returned';
                            } else {
                                return 'On Loan';
                            }
                        })
                        ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
