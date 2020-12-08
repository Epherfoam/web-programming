<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable = [
        'id', 'pizzaName', 'pizzaPhoto', 'pizzaDetail', 'pizzaPrice'
    ];

    public function transactionDataToTransactionItemFunc()
    {
        return $this->belongsToMany('App\Models\TransactionData');
    }

    public function pizzaToTransactionItemFunc()
    {
        return $this->belongsToMany('App\Models\Pizza');
    }
}
