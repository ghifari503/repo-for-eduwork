<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
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
        $loanDates = Transaction::select('date_start')->distinct()->orderBy('date_start', 'desc')->get();

        return view('admin.transaction.index', compact('transactionStatuses', 'loanDates'));
    }

    public function api(Request $request)
    {
        $transactions = Transaction::select('transactions.*', 'members.name', DB::raw('DATEDIFF(date_end, date_start) as duration'))
                                    ->join('members', 'members.id', 'transactions.member_id');

        if ($request->status == '0' || $request->status == '1') {
            $transactions = $transactions->where('status', $request->status);
        }

        if ($request->date_start) {
            $transactions = $transactions->where('date_start', $request->date_start);
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
        $members = Member::select('id', 'name')->orderBy('name', 'asc')->get();
        $books = Book::select('id', 'title')->where('qty', '>', '0')->orderBy('title', 'asc')->get();

        return view('admin.transaction.create',compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $attributes = request()->validate(
            [
            'member_id' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'book_id' => 'required'],
            [
            'member_id.required' => 'The member field is required.',
            'book_id.required' => 'The book field is required.',
            ]
        );

        $transaction = Transaction::create([
            'member_id' => $attributes['member_id'],
            'date_start' => $attributes['date_start'],
            'date_end' => $attributes['date_end'],
        ]);

        foreach ($attributes['book_id'] as $book_id) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'book_id' => $book_id,
                'qty'  => 1
            ]);

            Book::where('id', $book_id)
                ->decrement('qty', 1);
        }

        // return $request;

        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transaction.detail', ['transaction' => $transaction]);
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
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();

        if ($transaction->status == 1) {
            $transaction->delete();

            foreach ($transactionDetails as $transactionDetail) {
                TransactionDetail::where('id', $transactionDetail->id)->delete();
            }
        } else {
            $transaction->delete();

            foreach ($transactionDetails as $transactionDetail) {
                TransactionDetail::where('id', $transactionDetail->id)->delete();
                Book::where('id', $transactionDetail->book_id)
                    ->increment('qty', 1);
            }
        }

        return redirect('transactions');
    }
}
