@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('/index.css')}}">

<div class="container">
    <h1>Our Freshly Made Pizza!</h1>
    <h2 class="text-muted" style="margin-bottom: 1em;">Order it now!</h2>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">

                        @if(!Auth::check() || Auth::user()->role == 'Member')
                            <div style="margin-top: 0.6em; margin-right: 0.6em;">
                                <p>Search Pizza : </p>
                            </div>
                        <form action="/" class="d-flex">
                                <input type="text" class="form-control" name = "search" placeholder="Search">
                                <button type="submit" class="btn btn-primary" style="margin-left: 0.6em; vertical-align: middle;">Search</button>
                            </form>
                            <span class="input-group-btn">
                        @endif


                        @if(Auth::check())
                            @if(Auth::user()->role =='Admin')
                                <a href="{{'/addpizza'}}" type="button" class="btn btn-secondary" style="margin-left: 0.6em;">Add Pizza</a>
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
                <div class="row">
                    @foreach($pizzas as $pizza)
                        <div class="col-auto" style="margin-bottom:2em; margin-top:2em;">
                        <div class="card" >
                            <a href="{{asset('/pizza/' . $pizza->id )}}" >
                                <div style=" overflow:hidden; position: relative;">
                                    <img style="width:270px; height:270px; object-fit:cover;" src="{{asset('storage/' . $pizza->pizzaPhoto)}}" class="" alt="Pizza Picture" >
                                </div>
                                <div class="card-body">
                                <h5 class="card-title font-weight-bold" style="text-decoration : none; color: #000000;">{{$pizza->pizzaName}}</h5>
                                <p class="card-text font-weight-medium" style="margin-bottom:2em;text-decoration : none; color: #000000">Rp{{number_format($pizza->pizzaPrice,2,',','.')}}</p>
                            </a>
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
    <div class = "offset-5" style="padding-top: 30px;">
            {{$pizzas->links()}}
        </div>
</div>
@endsection
