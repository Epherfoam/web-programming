@extends('layouts.app')


@section('content')

@if (Auth::check())
    <div class="card">
        @foreach($transactionHistory as $tra)
        <div style="display: flex; flex-direction: row; padding-top:5rem; padding-left:6rem; padding-bottom:5rem">
            <div style="flex: 1">
                <img style="width:425px; height:400px; object-fit:cover;" src="{{ asset('storage/' . $tra->pizza->pizzaPhoto) }}" alt="">
            </div>
            <div style="flex: 2; padding-left:2em; ">
                <h1>{{$tra->pizza->pizzaName}}</h1>
                <div class="text-muted" style="font-size: 30pt">Rp{{ number_format($tra->pizza->pizzaPrice,2,',','.')}}</div>
                <p>Quantity: <b>{{$tra->itemQuantity}}</b></p>
                <p>Total Price: <b>Rp{{number_format($tra->itemQuantity * $tra->pizza->pizzaPrice,2,',','.')}}</b></p>

                <p>Description: <br><b>{{$tra->pizza->pizzaDetail}}</b></p>
            </div>
        </div>

        @endforeach

        <p class="text-center">Total Payment: <br><b>Rp{{number_format($totalProd,2,',','.')}}</b></p>
    </div>
@else
    <h1 class="col-6 offset-5">Access Denied</h1>
@endif
@endsection
