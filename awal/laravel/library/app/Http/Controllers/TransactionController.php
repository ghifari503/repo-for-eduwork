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
    public function index()
    {
        return view('admin.transactions.index', [
            'listOfBorrowedDate' => Transaction::select('date_start')->orderBy('date_start', 'desc')->distinct()->get()
        ]);
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

    public function create()
    {
        return view('admin.transactions.create', [
            'members' => Member::select('id', 'name')->orderBy('name', 'asc')->get(),
            'books' => Book::select('id', 'title')->where('qty', '>', '0')->orderBy('title', 'asc')->get()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'member_id' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'book_id' => 'required'
        ],[
            'member_id.required' => 'The member field is required.',
            'book_id.required' => 'The book field is required.',
        ]);

        $transaction = Transaction::create([
            'member_id' => $attributes['member_id'],
            'date_start' => $attributes['date_start'],
            'date_end' => $attributes['date_end'],
        ]);

        foreach ($attributes['book_id'] as $book_id) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'book_id' => $book_id
            ]);

            Book::where('id', $book_id)
                ->decrement('qty', 1);
        }

        return redirect()->route('transactions.index');
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transactions.show', [
            'transaction' => $transaction
        ]);
    }
}
