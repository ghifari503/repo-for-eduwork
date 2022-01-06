<?php
use App\Models\Transaction;

function dateFormat($value)
{
	return date('d-m-Y', strtotime($value));
}

function notifications()
{
	$notifications = Transaction::with('member')->select('transactions.*', DB::raw('DATEDIFF(transactions.date_end, CURRENT_DATE) as late'))->where('status', 0)->get();

	return $notifications;
}
?>