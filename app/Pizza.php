<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'id', 'pizzaName', 'pizzaPhoto', 'pizzaDetail', 'pizzaPrice'
    ];

    public function toTransItemFunc()
    {
        return $this->HasMany('App\Models\TransactionItem');
    }
}
