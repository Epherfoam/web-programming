@extends('layouts.app')

@section('content')



<div style="display: flex; flex-direction: row; padding-top:5rem; padding-left:6rem; ">
    <div style="flex: 1">
        <img style="width:425px; height:400px; object-fit:cover;" src="{{ asset('storage/' . $pizzaId->pizzaPhoto) }}" alt="">
    </div>
    <div style="flex: 2; padding-left:2em; ">
        <h1>{{$pizzaId->pizzaName}}</h1>
        <div class="text-muted" style="font-size: 30pt">Rp{{ number_format($pizzaId->pizzaPrice,2,',','.')}}</div>
    <p>{{$pizzaId->pizzaDetail}}</p>
        @if(Auth::check())
            @if(Auth::user()->role =='Member')
            <div class="input-group">
                <div style="margin-top: 0.6em; margin-right: 0.6em;">
                    <p>Quantity : </p>
                </div>
                <div class="col-xd-2">
                    <input type="number" class="form-control input-sm" id="quantity" placeholder="Minimal 1." >
                </div>
            </div>
            <a href="" type="button" class="btn btn-primary align-middle" style=" text-align:center;">Add to cart</a>
            @endif
        @endif
    </div>
</div>
@endsection
