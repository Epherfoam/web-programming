<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'user_id', 'pizza_id', 'order_id', 'price', 'itemQuantity', 'username'
    ];

    public function transactionData()
    {
        return $this->belongsTo('App\TransactionData');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //belongsToMany (linking table) -> hubungin semuanya tanpa specify di kolom, jadiin relasinya ke table baru (butuh peratara, pizza_transaction_item)
    //jadi transactionItem ini penghubung sama user dan pizza kalo pake belongsToMany
    //bakal bermasalah di frontendnya

    //belongsTo -> suatu table punya table lain (langsung akses)
    //jadi panggil lompat aja, sama aja kek belongsToMany cuma manual aja

    public function pizza()
    {
        return $this->belongsTo('App\Pizza');
    }
}
