<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Pizza;


class PizzaController extends Controller
{
    public function pizzaMenu()
    {
        $pizzas = Pizza::paginate(6);
        return view('home', compact('pizzas'));
    }

    public function pizzaDetail($id)
    {
        $pizzaId = Pizza::find($id);
        return view('detail', compact('pizzaId'));
    }

    public function pizzaSearch(Request $request)
    {
        $input = $request->search;
        $pizzas = Pizza::where('pizzaName', 'like', "%" . $input . "%")->paginate(6);
        return view('home', compact('pizzas'));
    }

    protected function pizzaAdd(Request $request)
    {
        $pName = $request->pizzaName;
        $pDesc = $request->pizzaDetail;
        $pPrice = $request->pizzaPrice;

        return Validator::make($request, [
            'pizzaName' => ['required', 'string', 'max:255'],
            'pizzaDetail' => ['required', 'string', 'min:8'],
            'pizzaPrice' => ['required', 'numeric', 'min:20000'],
            'pizzaImage' => ['required', 'string', 'max:15'],
        ]);

        return redirect('/');
    }
}
