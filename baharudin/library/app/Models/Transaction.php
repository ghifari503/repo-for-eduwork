<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'member_id',
        'date_start',
        'date_end',
     ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }

    public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id');
    }
}