@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Our Freshly Made Pizza!</h1>
    <h2 class="text-muted" style="margin-bottom: 1em;">Order it now!</h2>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <div style="margin-top: 0.6em; margin-right: 0.6em;">
                        <p>Search Pizza : </p>
                    </div>
                    <input type="text" class="form-control" name="x" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" style="margin-left: 0.6em;">Search</button>
                        @if(Auth::check())
                        @if(Auth::user()->role =='Admin')
                        <button type="button" class="btn btn-secondary" style="margin-left: 0.6em;">Add Pizza</button>
                        @endif
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card-deck">
                <div class="row d-flex">
                    @foreach($pizzas as $pizza)
                    <div class="col-4" style="margin-bottom:2em;">
                        <div class="card">
                            <div style=" overflow:hidden; position: relative;">
                                <img style="width:270px; height:270px; object-fit:cover;" src="{{asset('image/' . $pizza->pizzaPhoto)}}" class="" alt="Pizza Picture" >
                            </div>
                            <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$pizza->pizzaName}}</h5>
                            <p class="card-text font-weight-medium">Rp {{$pizza->pizzaPrice}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
