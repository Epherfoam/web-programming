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

                <form action="{{url('/cartPizza/' . $pizzaId->id)}}" method="post">
                    @csrf
                    <div class="col-xd-2">
                        <input type="number" class="form-control input-sm @error('quantity') is-invalid @enderror"  name="quantity" id="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" placeholder="Minimal 1." >
                    </div>
                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-primary " style="margin-top: 1em; text-align:center;">Add to cart</button>
                    {{--dd($pizzaId)--}}

                    @if (session('success'))
                        <div class="alert alert-success" style="margin-top: 2em">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" style="margin-top: 2em">
                            {{ session('error') }}
                        </div>
                    @endif

                </form>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection
