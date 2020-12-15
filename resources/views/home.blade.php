@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('/index.css')}}">

<div class="container">

    {{-- Title for home page ('/' or /home) --}}
    <h1>Our Freshly Made Pizza!</h1>
    <h2 class="text-muted" style="margin-bottom: 1em;">Order it now!</h2>

    {{-- A section for buttons before cards exist--}}
    <div class="container">
        <div class="row" >
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    {{-- Section 0, if user is a guest or a member--}}
                        @if(!Auth::check() || Auth::user()->role == 'Member')
                            <div style="margin-top: 0.6em; margin-right: 0.6em;">
                                <p>Search Pizza : </p>
                            </div>
                            <form action="/" class="d-flex">
                                <input type="text" class="form-control" name = "search" placeholder="Search">
                                <button type="submit" class="btn btn-primary" style="margin-left: 0.6em; vertical-align: middle;">Search</button>
                            </form>
                        @endif

                    {{-- Section 1, if user is a guest or a member--}}
                        @if(Auth::check())
                            @if(Auth::user()->role =='Admin')
                                <a href="{{'/addpizza'}}" type="button" class="btn btn-secondary" style="margin-left: 0.6em;">Add Pizza</a>
                            @endif
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card-deck">
            {{-- Row, if the card trying to overflow the set size--}}
            <div class="row" style="justify-content: center;">
                {{-- Loop until data set --}}
                @foreach($pizzas as $pizza)
                    {{-- Make card as column to right--}}
                    <div class="col-auto" style="margin-bottom:2em; margin-top:2em;">
                        {{-- Create Card--}}
                        <div class="card" >
                            {{-- The tag <a> covers picture, name, and price pizza so they're clickable as redirect to other link--}}
                            <a href="{{asset('/pizza/' . $pizza->id )}}" >
                                <div style=" overflow:hidden; position: relative;">
                                    <img style="width:270px; height:270px; object-fit:cover;" src="{{asset('storage/' . $pizza->pizzaPhoto)}}" class="" alt="Pizza Picture" >
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold" style="text-decoration : none; color: #000000;">{{$pizza->pizzaName}}</h5>
                                        <p class="card-text font-weight-medium" style="margin-bottom:2em;text-decoration : none; color: #000000">Rp{{number_format($pizza->pizzaPrice,2,',','.')}}</p>
                                </a>
                            {{-- If Admin, show update and delete button inside the cart--}}
                            @if (Auth::check())
                                @if(Auth::user()->role =='Admin')
                                    <a href="{{asset('/updatePizza/' . $pizza->id)}}" type="button" class="btn btn-primary">Update Pizza</a>
                                    <a href="{{asset('/deletePizza/' . $pizza->id)}}" type="button" class="btn btn-danger">Delete Pizza</a>
                                @endif
                            @endif
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Display pagination --}}
<div style="display:flex; justify-content:center; align-items: center; padding-top: 30px;">
        {{$pizzas->links()}}
</div>

@endsection
