<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

use Illuminate\Http\Request;
use DB;

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
        return view('admin.transaction');
    }

    public function api(Request $request)
    {
        // $transactions = Transaction::with('transactionDetail', 'member')->get();
        $transactions = Transaction::select('transactions.id', 'name', 'date_start', 'date_end',
             DB::raw('DATEDIFF(date_end, date_start) as duration'),
             DB::raw('COUNT(transaction_details.transaction_id) as total_transactions'),
             DB::raw('SUM(books.price) as total_costs'),
             'status')
             ->join('members', 'members.id', 'transactions.member_id')
             ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
             ->join('books', 'books.id', 'transaction_details.id')
             ->groupBy('transactions.id', 'transactions.date_start', 'transactions.date_end', 'members.name', 'transaction_details.transaction_id', 'transactions.status')
             ->get();

        foreach ($transactions as $key => $transaction) {
            $transaction->total_costs = "Rp. " . number_format($transaction->total_costs, 0, ",", ".");
        }

        $datatables = datatables()->of($transactions)->addIndexColumn();

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
