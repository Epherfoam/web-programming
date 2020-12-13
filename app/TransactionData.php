<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionData extends Model
{
    protected $fillable = [
        'id', 'totalPrice', 'user_id', 'created_at', 'updated_at',
    ];

    public function transactionItem()
    {
        return $this->HasMany('App\TransactionItem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
