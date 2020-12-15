<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pizza;


class PizzaController extends Controller
{
    //home paginate card
    public function pizzaMenu()
    {
        $pizzas = Pizza::paginate(6);
        return view('home', compact('pizzas'));
    }

    //show detail page
    public function pizzaDetail($id)
    {
        $pizzaId = Pizza::find($id);
        return view('user.detail', compact('pizzaId'));
    }

    //search fucntion
    public function pizzaSearch(Request $request)
    {
        $input = $request->search;
        $pizzas = Pizza::where('pizzaName', 'like', "%" . $input . "%")->paginate(6);
        return view('home', compact('pizzas'));
    }

    //add pizza for admin
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

    //return pizza update page view
    public function pizzaUpdateView($id)
    {
        $pizzaId = Pizza::find($id);
        return view('admin.update', compact('pizzaId'));
    }

    // pizza update function
    public function pizzaUpdate(Request $request, $id)
    {
        //dd($id);
        $imageData = $request->pizzaPhoto->store('image', 'public');

        $request->validate([
            'pizzaName' => ['required', 'string', 'max:20'],
            'pizzaDetail' => ['required', 'string', 'min:20'],
            'pizzaPrice' => ['required', 'numeric', 'min:10000'],
            'pizzaPhoto' => ['required'],
        ]);
        Pizza::where('id', '=', $id)->update([
            'pizzaName' => $request->pizzaName,
            'pizzaDetail' => $request->pizzaDetail,
            'pizzaPrice' => $request->pizzaPrice,
            'pizzaPhoto' => $imageData,
        ]);
        return redirect('/');
    }


    //return pizza delete page view
    public function pizzaDeleteView($id)
    {
        $pizzaId = Pizza::find($id);
        return view('admin.delete', compact('pizzaId'));
    }

    //pizza delete function
    public function pizzaDelete($id)
    {
        $delete = Pizza::find($id);
        History::where('pizza_id', $id)->delete();
        Pizza::where('id', $id)->delete();
        return redirect('home');
    }
}
