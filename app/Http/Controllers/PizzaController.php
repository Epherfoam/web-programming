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

    // public function pizzaSearch(Request $request)
    // {
    //     $find = $request->find;
    //     $pizzas = Pizza::where('pizzaName', 'like', "%" . $find . "%")->get()->paginate(6);
    //     return view('search', compact('pizzas'));
    // }

    // public function pizzaDetail($id)
    // {
    //     $pizza = Pizza::all();
    //     return view('home', compact('pizzas'));
    // }
}
