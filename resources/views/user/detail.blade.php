@extends('layouts.app')

@section('content')

{{-- As diplay with image on the left and details on the right, I'm trying to use flex as more easy to set the display right--}}
{{-- Yehezkiel Andrean - 2201733162 (Solo Worked) --}}

<div style="display: flex; flex-direction: row; padding-top:5rem; padding-left:6rem; ">
    {{-- There is 2 flex to indicate which is left and right --}}

    {{-- Flex 1, is where the image were set on the left. --}}
    <div style="flex: 1">
        <img style="width:425px; height:400px; object-fit:cover;" src="{{ asset('storage/' . $pizzaId->pizzaPhoto) }}" alt="">
    </div>

    {{-- Flex 2, is where the detail were set on the right. --}}
    <div style="flex: 2; padding-left:2em; ">
        {{-- Pizza Name Display --}}
        <h1>{{$pizzaId->pizzaName}}</h1>
        {{-- Pizza Price --}}
        <div class="text-muted" style="font-size: 30pt">Rp{{ number_format($pizzaId->pizzaPrice,2,',','.')}}</div>
        {{-- Pizza Detail --}}
        <p>{{$pizzaId->pizzaDetail}}</p>

        {{-- Checking If the detail auth role --}}
        @if(Auth::check())
            {{-- if user's role is Member --}}
            @if(Auth::user()->role =='Member')

            {{-- There is some quantity text field and quantity button --}}
            <div class="input-group">
                <div style="margin-top: 0.6em; margin-right: 0.6em;">
                    <p>Quantity : </p>
                </div>
                {{-- Form that holds data-send to another redirect--}}
                <form action="{{url('/cartPizza/' . $pizzaId->id)}}" method="post">
                    @csrf

                    {{-- Check is number empty from the frontend --}}
                    <div class="col-xd-2">
                        <input type="number" class="form-control input-sm @error('quantity') is-invalid @enderror"  name="quantity" id="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" placeholder="Minimal 1." >
                    </div>
                    {{-- This error will occur when the controller caught mismatch or illegal input that has been validated --}}
                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    {{-- Button submit --}}
                    <button type="submit" class="btn btn-primary " style="margin-top: 1em; text-align:center;">Add to cart</button>

                    {{-- If Controller's response to correct input --}}
                    @if (session('success'))
                        <div class="alert alert-success" style="margin-top: 2em">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- But, if controller caught some attempt duplicating data to cart --}}
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
