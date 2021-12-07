<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

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

        return view('home');
    }
}
