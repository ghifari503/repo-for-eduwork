<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

function convert_date($value)
{
    return date('d M Y - H:i:s', strtotime($value));
}

function convert_to_rupiah($number)
{
    return 'Rp. ' . strrev(implode('.', str_split(strrev(strval($number)), 3)));
}

function notifications()
{
   $notifications = Transaction::with('member')->select('transactions.*', DB::raw('DATEDIFF(CURRENT_DATE, transactions.date_end) as late_days'))->where('status', 0)->get();

   return $notifications;
}