<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    public function pizzaMenu()
    {
        $pizzas = Pizza::all();
        return view('home', compact('pizzas'));
    }
}
