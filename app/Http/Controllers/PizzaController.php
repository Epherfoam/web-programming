<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pizza;
use Carbon\Traits\Timestamp;

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


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(Request $request)
    // {
    //     return Validator::make($request->all(), [
    //         'pizzaName' => ['required', 'string', 'max:20'],
    //         'pizzaDetail' => ['required', 'string', 'min:20'],
    //         'pizzaPrice' => ['required', 'numeric', 'min:10000'],
    //         'pizzaPhoto' => ['required', 'string'],
    //     ]);
    // }

    protected function pizzaAdd(Request $request)
    {
        //dd($request->pizzaPhoto);
        $imageData = $request->pizzaPhoto->store('image', 'public');

        $request->validate([
            'pizzaName' => ['required', 'string', 'max:20'],
            'pizzaDetail' => ['required', 'string', 'min:20'],
            'pizzaPrice' => ['required', 'numeric', 'min:10000'],
            'pizzaPhoto' => ['required'],
        ]);

        Pizza::create([
            'pizzaName' => $request->pizzaName,
            'pizzaDetail' => $request->pizzaDetail,
            'pizzaPrice' => $request->pizzaPrice,
            'pizzaPhoto' => $imageData,

        ]);

        return redirect('/');
    }
}
