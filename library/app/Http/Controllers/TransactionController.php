<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
   
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
        return view('admin.transaction.index');
    }


    public function api(Request $request)
    {
        if ($request->status == 0) {
            // $transaction = Transaction::where('status', $request->status)->get();
            $data = Member::select('transactions.date_start', 'transactions.date_end', 'members.name', DB::raw('DATEDIFF(date_end, date_start) as lama_pinjam') ,DB::raw('SUM(transaction_details.qty) as total_buku'), DB::raw('SUM(transaction_details.qty * books.price) as total_price'),'status' )
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->groupBy('transactions.date_start', 'transactions.date_end', 'members.name', 'transactions.status')
            ->where('status', $request->status)
            ->get();
        } elseif ($request->status == 1) {
            $data = Member::select('transactions.date_start', 'transactions.date_end', 'members.name', DB::raw('DATEDIFF(date_end, date_start) as lama_pinjam') ,DB::raw('SUM(transaction_details.qty) as total_buku'), DB::raw('SUM(transaction_details.qty * books.price) as total_price'),'status' )
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->groupBy('transactions.date_start', 'transactions.date_end', 'members.name', 'transactions.status')
            ->where('status', $request->status)
            ->get();
        } else  {
            $data = Member::select('transactions.date_start', 'transactions.date_end', 'members.name', DB::raw('DATEDIFF(date_end, date_start) as lama_pinjam') ,DB::raw('SUM(transaction_details.qty) as total_buku'), DB::raw('SUM(transaction_details.qty * books.price) as total_price'),'status' )
            ->join('transactions', 'members.id', 'transactions.member_id')
            ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
            ->join('books', 'books.id', 'transaction_details.book_id')
            ->groupBy('transactions.date_start', 'transactions.date_end', 'members.name', 'transactions.status')
            ->get();
        };
        
        $datatables = datatables()->of($data)->addColumn('status', function($data){
            if($data->status == 1){
                return 'Selesai';
            } else {
                return 'Belum Kembali';
            }
        })->addIndexColumn();

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

        return view('admin.transaction.create',compact('members','books'));
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

        return redirect('transactions')->with('success','Success create new transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {

        $transaction = Transaction::all();
        $members = Member::select('id', 'name')->orderBy('name', 'asc')->get();
        $books = Book::select('id', 'title')->where('qty', '>', '0')->orderBy('title', 'asc')->get();
        return view('admin.transactions.edit',compact('transaction','members','books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit',compact('transaction'));
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
