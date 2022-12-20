<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
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
        // $members = Member::with('user')->get();
        // $book = Book::with('Author')->get();
        // $book = Book::with('catalog')->get();
        // $book = Book::with('publisher')->get();

        // $data = Member::select('*')->join('users', 'users.member_id', '=', 'members_id');


        // return $data;

        // return $members;
        // return $book;
        return view('home');
    }
}


