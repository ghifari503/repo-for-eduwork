<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function detail_transaction()
    {
        return $this->hasOne(DetailTransaction::class, 'transaction_id');
    }
}
