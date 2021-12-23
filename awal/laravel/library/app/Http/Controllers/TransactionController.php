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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('admin.transactions.index', [
                'listOfBorrowedDate' => Transaction::select('date_start')->orderBy('date_start', 'desc')->distinct()->get()
            ]);
        } else {
            abort(403);
        }
        // if (auth()->user()->hasPermissionTo('view transactions')) {
        //     return view('admin.transactions.index', [
        //         'listOfBorrowedDate' => Transaction::select('date_start')->orderBy('date_start', 'desc')->distinct()->get()
        //     ]);
        // } else {
        //     abort(403);
        // }
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

    public function edit(Transaction $transaction)
    {
        return view('admin.transactions.edit', [
            'transaction' => $transaction,
            'members' => Member::select('id', 'name')->orderBy('name', 'asc')->get(),
            'books' => Book::select('id', 'title')->where('qty', '>', '0')->orderBy('title', 'asc')->get()
        ]);
    }

    public function update(Transaction $transaction)
    {
        $oldTransactionDetails = TransactionDetail::select('id', 'book_id')
                                    ->where('transaction_id', $transaction->id)
                                    ->get();

        $attributes = request()->validate([
            'member_id' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'book_id' => 'required',
            'status' => 'required',
        ],[
            'member_id.required' => 'The member field is required.',
            'book_id.required' => 'The book field is required.',
        ]);

        $transaction->update([
            'member_id' => $attributes['member_id'],
            'date_start' => $attributes['date_start'],
            'date_end' => $attributes['date_end'],
            'status' => $attributes['status']
        ]);

        if ($attributes['status'] == 1) {
            foreach ($attributes['book_id'] as $book_id) {
                $transactionDetail = TransactionDetail::updateOrCreate([
                    'book_id' => $book_id,
                    'transaction_id' => $transaction->id
                ]);

                if ($transactionDetail->wasRecentlyCreated) {
                    Book::where('id', $transactionDetail->book_id)
                        ->increment('qty', 1);
                }

                if (!$transactionDetail->wasRecentlyCreated && !$transactionDetail->wasChanged()) {
                    foreach ($oldTransactionDetails as $oldTransactionDetail) {
                        if ($transactionDetail->id != $oldTransactionDetail->id) {
                            TransactionDetail::where('id', $oldTransactionDetail->id)->delete();

                            Book::where('id', $oldTransactionDetail->book_id)
                                ->decrement('qty', 1);
                        }
                    }
                }
            }
        } else {
            foreach ($attributes['book_id'] as $book_id) {
                $transactionDetail = TransactionDetail::updateOrCreate([
                    'book_id' => $book_id,
                    'transaction_id' => $transaction->id
                ]);

                if ($transactionDetail->wasRecentlyCreated) {
                    Book::where('id', $transactionDetail->book_id)
                        ->decrement('qty', 1);
                }

                if (!$transactionDetail->wasRecentlyCreated && !$transactionDetail->wasChanged()) {
                    foreach ($oldTransactionDetails as $oldTransactionDetail) {
                        if ($transactionDetail->id != $oldTransactionDetail->id) {
                            TransactionDetail::where('id', $oldTransactionDetail->id)->delete();

                            Book::where('id', $oldTransactionDetail->book_id)
                                ->increment('qty', 1);
                        }
                    }
                }
            }
        }

        return redirect()->route('transactions.index');
    }

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

        return redirect()->route('transactions.index');
    }
}
