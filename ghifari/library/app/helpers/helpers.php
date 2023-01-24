<?php

use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

function convert_date($value)
{
    return date('d M Y', strtotime($value));
}

function notifications()
{
	$notifications = App\Models\Transaction::with('member')->select('transactions.*', DB::raw('DATEDIFF(transactions.date_end, CURRENT_DATE) as late'))->where('status', 0)->get();

	return $notifications;
}
?>
