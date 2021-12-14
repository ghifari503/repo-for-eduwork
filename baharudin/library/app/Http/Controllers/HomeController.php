<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Catalog;
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
        return view('home');

        // Query builder task
        // Query 1
        $data1 = Member::select('*')
                    ->join('users', 'users.member_id', 'members.id')
                    ->get();

        // Query 2
        $data2 = Member::select('*')
                    ->leftJoin('users', 'users.member_id', 'members.id')
                    ->where('users.id', NULL)
                    ->get();

        // Query 3
        $data3 = Member::select('members.id', 'members.name')
                    ->leftJoin('transactions', 'transactions.member_id', 'members.id')
                    ->where('transactions.member_id', NULL)
                    ->get();

        // Query 4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->orderBy('members.id', 'asc')
                    ->get();

        // Query 5
        $data5 = Member::select(DB::raw('COUNT(transactions.member_id) as total_transactions'), 'members.id', 'members.name', 'members.phone_number')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->groupBy('transactions.member_id', 'members.id', 'members.name', 'members.phone_number')
                    ->having('total_transactions', '>', '1')
                    ->get();

        // Query 6
        $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->orderBy('transactions.date_start', 'asc')
                    ->get();

        // Query 7
        $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->whereMonth('transactions.date_end', '6')
                    ->get();

        // Query 8
        $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->whereMonth('transactions.date_start', '5')
                    ->get();

        // Query 9
        $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->whereMonth('transactions.date_start', '6')
                    ->whereMonth('transactions.date_end', '6')
                    ->get();

        // Query 10
        $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->where('members.address', 'LIKE', '%Bandung%')
                    ->get();

        // Query 11
        $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->where('members.address', 'LIKE', '%Bandung%')
                    ->where('members.gender', 'f')
                    ->get();

        // Query 12
        $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                    ->join('books', 'books.id', 'transaction_details.book_id')
                    ->where('transaction_details.qty', '>', '1')
                    ->get();

        // Query 13
        $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price', DB::raw('books.price * transaction_details.qty as total_price'))
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                    ->join('books', 'books.id', 'transaction_details.book_id')
                    ->orderBy('transaction_details.transaction_id', 'asc')
                    ->get();

        // Query 14
        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price', 'publishers.name', 'authors.name', 'catalogs.name')
                    ->join('transactions', 'transactions.member_id', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                    ->join('books', 'books.id', 'transaction_details.book_id')
                    ->join('publishers', 'publishers.id', 'books.publisher_id')
                    ->join('authors', 'authors.id', 'books.author_id')
                    ->join('catalogs', 'catalogs.id', 'books.catalog_id')
                    ->orderBy('transactions.date_start', 'asc')
                    ->get();

        // Query 15
        $data15 = Catalog::select('catalogs.id', 'catalogs.name', 'books.title')
                    ->join('books', 'books.catalog_id', 'catalogs.id')
                    ->get();

        // Query 16
        $data16 = Book::select('books.isbn', 'books.title', 'books.year', 'books.publisher_id', 'publishers.name', 'books.author_id', 'books.catalog_id', 'books.qty', 'books.price')
                    ->leftJoin('publishers', 'books.publisher_id', 'publishers.id')
                    ->get();

        // Query 17
        $data17 = Book::select(DB::raw('SUM(author_id) as total_books'))
                    ->where('author_id', '=', 'PG05')
                    ->get();

        // Query 18
        $data18 = Book::select('*')
                    ->where('price', '>', '10000')
                    ->get();

        // Query 19
        $data19 = Book::select('*')
                    ->where('publisher_id', '=', '1')
                    ->where('qty', '>' ,'10')
                    ->get();

        // Query 20
        $data20 = Member::select('*')
                    ->whereMonth('created_at', '6')
                    ->get();

        // Execute query data(n)
        return $data20;
    }
}
