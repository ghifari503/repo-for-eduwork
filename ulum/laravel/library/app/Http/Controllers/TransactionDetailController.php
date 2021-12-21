<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
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
        for ($i = 0; $i < count($request->book_id); $i++) {
            $data = [
                'transaction_id' => $request->transaction_id,
                'book_id' => $request->book_id[$i],
                'qty' => 1
            ];

            TransactionDetail::create($data);
        }

        return redirect('loans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datas = TransactionDetail::where('transaction_id', $request->transaction_id)->get();

        $booksNow = [];
        $transaction_details_id = [];

        foreach ($datas as $data) {
            array_push($booksNow, $data->book_id);
            array_push($transaction_details_id, $data->id);
        }

        $transaction_details_id_reverse = array_reverse($transaction_details_id);


        if (count($booksNow) == count($request->book_id)) {
            // change if the total books are the same
            for ($i = 0; $i < count($booksNow); $i++) {
                TransactionDetail::where('id', $transaction_details_id[$i])->update(['book_id' => $request->book_id[$i]]);
            }
        } else if (count($request->book_id) < count($booksNow)) {
            // change if the total number of books is less
            // Delete unused book data 
            for ($i = 0; $i < (count($booksNow) - count($request->book_id)); $i++) {
                TransactionDetail::where('id', $transaction_details_id_reverse[$i])->delete();
                array_splice($transaction_details_id_reverse, $i, 1);
            }

            // Update book data
            for ($j = 0; $j < count($request->book_id); $j++) {
                TransactionDetail::where('id', $transaction_details_id_reverse[$j])->update(['book_id' => $request->book_id[$j]]);
            }
        } else if (count($request->book_id) > count($booksNow)) {
            // change if there are more books
            // Update book data
            for ($j = 0; $j < count($booksNow); $j++) {
                TransactionDetail::where('id', $transaction_details_id[$j])->update(['book_id' => $request->book_id[$j]]);
            }
            // add book data
            for ($i = count($booksNow); $i < count($request->book_id); $i++) {
                $create = [
                    'transaction_id' => $request->transaction_id,
                    'book_id' => $request->book_id[$i],
                    'qty' => 1
                ];
                TransactionDetail::create($create);
            }
        }

        return redirect('loans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        //
    }
}
