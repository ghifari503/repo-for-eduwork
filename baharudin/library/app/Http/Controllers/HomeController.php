<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\Publisher;
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
        $total_books = Book::count();
        $total_members = Member::count();
        $total_transactions = Transaction::count();
        $total_publishers = Publisher::count();

        $label_donut = Publisher::orderBy('publisher_id')->join('books', 'books.publisher_id', 'publishers.id')->groupBy('publishers.name')->pluck('publishers.name');
        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id')->pluck('total');

        $label_bar = ['Transactions'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = 'rgba(60, 141, 138, 0.9)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('total_books', 'total_members', 'total_transactions', 'total_publishers', 'data_donut', 'label_donut', 'data_bar'));
    }
}
