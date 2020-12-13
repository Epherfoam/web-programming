<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pizza;
use App\TransactionItem;
use App\User;
use App\TransactionData;
use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function receiveCart(Request $request, $id)
    {
        $pizzaId = Pizza::find($id);

        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1'],
        ]);

        $pizzaSame = TransactionItem::where('pizza_id', $id)->where('user_id', Auth::id())->first();


        if ($pizzaSame == null) {
            TransactionItem::create([
                'user_id' => Auth::id(), //dd($pizzaSame);
                'pizza_id' => $pizzaId->id,
                'order_id' => null,
                'itemQuantity' => $request->quantity,

            ]);

            History::create([
                'user_id' => Auth::id(),
                'pizza_id' => $pizzaId->id,
                'order_id' => null,
                'price' => $pizzaId->pizzaPrice,
                'itemQuantity' => $request->quantity,
                'username' => Auth::user()->username,
            ]);
        } else {
            return back()->with('error', 'Pizza multiple, you can update or delete at cart');
        }
        //dd($pizzaSame);
        return back()->with('success', 'Pizza added, you can safely go to home or to cart');
    }

    public function viewCart(Request $request)
    {
        $transactionItem = TransactionItem::where('user_id', Auth::id())->get();

        $currentTotalProd = 0;

        foreach ($transactionItem as $t) {
            $currentTotalProd += $t->itemQuantity * $t->pizza->pizzaPrice;
        }

        return view('cart', compact('transactionItem', 'currentTotalProd'));
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1'],
        ]);

        TransactionItem::where('id', '=', $id)->update([
            'itemQuantity' => $request->quantity,
        ]);
        return back();
    }

    public function deleteCart(Request $request, $id)
    {
        TransactionItem::where('id', '=', $id)->delete();
        return back();
    }

    public function checkout()
    {

        $transactionItem = TransactionItem::where('user_id', Auth::id())->where('order_id', '=', null)->get();

        $totalProd = 0;

        foreach ($transactionItem as $t) {
            $totalProd += $t->itemQuantity * $t->pizza->pizzaPrice;
        }


        $order = TransactionData::create([
            'totalPrice' => $totalProd,
            'user_id' => Auth::id(),
        ]);

        History::where('user_id', Auth::id())->where('order_id', '=', null)->update([
            'order_id' => $order->id,
        ]);

        TransactionItem::query()->delete();

        return redirect('/');
    }

    public function viewTransaction()
    {
        $transactionGet = TransactionData::where('user_id', Auth::id())->get();
        return view('transactionUser', compact('transactionGet'));
    }

    public function viewTransactionHistory(Request $request, $id)
    {

        if (Auth::user()->role == 'Member') {
            $transactionHistory = History::where('user_id', Auth::id())->where('order_id', '=', $id)->get();
        } else if (Auth::user()->role == 'Admin') {
            $transactionHistory = History::where('order_id', '=', $id)->get();
        }

        // dd($transactionHistory);

        $totalProd = 0;

        foreach ($transactionHistory as $t) {
            $totalProd += $t->itemQuantity * $t->pizza->pizzaPrice;
        }
        return view('transactionUserDetail', compact('transactionHistory', 'totalProd'));
    }

    public function viewAllTransaction()
    {
        $transactionGet = TransactionData::where('id', '!=', null)->get();

        return view('allTransactionUser', compact('transactionGet'));
    }
}
