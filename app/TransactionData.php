<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionData extends Model
{
    public function transactionItemToTransactionDataFunc()
    {
        return $this->HasMany('App\Models\TransactionItem');
    }

    public function userToTransactionDataFunc()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
