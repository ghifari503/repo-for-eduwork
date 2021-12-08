<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use App\Models\Member;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Testing Relationship
        // return Member::with('user')->get();
        // return User::with('member')->get();
        // return Book::with(['publisher', 'author', 'catalog'])->get();
        // return Publisher::with('books')->get();
        // return Author::with('books')->get();
        // return Catalog::with('books')->get();
        // return Member::with('transactions')->get();
        // return Member::with('transactions.transactionDetails.books')->get();
        // return Transaction::with(['member', 'transactionDetails.books'])->get();

        // Task Query Builder
        // $query1 = Member::with('user')->select('*')
        //             ->join('users', 'members.id', 'users.id')
        //             ->get();
        // return $query1;

        // $query2 = Member::select('members.*')
        //             ->leftJoin('users', 'members.id', 'users.id')
        //             ->whereNull('users.member_id')
        //             ->get();
        // return $query2;

        // $query3 = Member::select('members.id', 'members.name')
        //             ->leftJoin('transactions', 'members.id', 'transactions.member_id')
        //             ->whereNull('transactions.member_id')
        //             ->get();
        // return $query3;

        // $query4 = Member::select('members.id', 'members.name')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->get();
        // return $query4;

        // $query5 = Member::select('members.id', 'members.name', 'members.phone_number', DB::raw('COUNT(*) as transaction_member_count'))
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->groupBy('transactions.member_id')
        //             ->having('transaction_member_count', '>', 1)
        //             ->get();
        // return $query5;

        // $query6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->get();
        // return $query6;

        // $query7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->whereMonth('date_end', 6)
        //             ->get();
        // return $query7;

        // $query8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->whereMonth('date_start', 5)
        //             ->get();
        // return $query8;

        // $query9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->whereMonth('date_start', 6)
        //             ->orWhereMonth('date_end', 6)
        //             ->get();
        // return $query9;

        // $query10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->groupBy('transactions.member_id')
        //             ->where('members.address', 'Bandung')
        //             ->get();
        // return $query10;

        // $query11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->groupBy('transactions.member_id')
        //             ->where('members.address', 'Bandung')
        //             ->Where('members.gender', 'P')
        //             ->get();
        // return $query11;

        // $query12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
        //             ->join('books', 'books.id', 'transaction_details.book_id')
        //             ->groupBy('transactions.id')
        //             ->where('transaction_details.qty', '>', 1)
        //             ->get();
        // return $query12;

        // $query13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price', DB::raw('SUM(transaction_details.qty * books.price) as total_price'))
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
        //             ->join('books', 'books.id', 'transaction_details.book_id')
        //             ->groupBy(['transaction_details.transaction_id', 'transaction_details.book_id'])
        //             ->get();
        // return $query13;

        // $query14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'publishers.name AS publisher_name', 'authors.name AS author_name', 'catalogs.name AS catalog_name')
        //             ->join('transactions', 'members.id', 'transactions.member_id')
        //             ->join('transaction_details', 'transactions.id', 'transaction_details.transaction_id')
        //             ->join('books', 'books.id', 'transaction_details.book_id')
        //             ->join('publishers', 'publishers.id', 'books.publisher_id')
        //             ->join('authors', 'authors.id', 'books.author_id')
        //             ->join('catalogs', 'catalogs.id', 'books.catalog_id')
        //             ->get();
        // return $query14;

        // $query15 = Catalog::select('catalogs.*', 'books.title AS book_title')
        //             ->join('books', 'catalogs.id', 'books.catalog_id')
        //             ->get();
        // return $query15;

        // $query16 = Book::select('books.*', 'publishers.name AS publisher_name')
        //             ->rightJoin('publishers', 'publishers.id', 'books.publisher_id')
        //             ->get();
        // return $query16;

        // $query17 = Book::select(DB::raw('COUNT(books.author_id) as total_author'))
        //             ->join('authors', 'authors.id', 'books.author_id')
        //             ->where('authors.name', 'PG05')
        //             ->get();
        // return $query17;

        // $query18 = Book::where('price', '>', 10000)->get();
        // return $query18;

        // $query19 = Book::select('books.*')
        //             ->join('publishers','publishers.id', 'books.publisher_id')
        //             ->where('publishers.name', 'Tatum Kemmer Jr.')
        //             ->where('books.qty', '>', 10)
        //             ->get();
        // return $query19;

        // $query20 = Member::whereMonth('created_at', 6)->get();
        // return $query20;

        return view('home');
    }
}
