@extends('layouts.app')

@section('content')

    @if (Auth::check())
    {{-- Check if member, if not return denied page --}}
        @if (Auth::user()->role =='Member')
        {{-- Create card filled with items --}}
            <div class="card">
                {{-- Loop until end of data --}}
                @foreach($transactionItem as $tra)
                    {{-- Same as detail, using flex to directing layout left and right --}}
                    <div style="display: flex; flex-direction: row; padding-top:5rem; padding-left:6rem; padding-bottom:5rem">
                        <div style="flex: 1">
                            <img style="width:425px; height:400px; object-fit:cover;" src="{{ asset('storage/' . $tra->pizza->pizzaPhoto) }}" alt="">
                        </div>
                        <div style="flex: 2; padding-left:2em; ">
                            <h1>{{$tra->pizza->pizzaName}}</h1>
                            <div class="text-muted" style="font-size: 30pt">Rp{{ number_format($tra->pizza->pizzaPrice,2,',','.')}}</div>
                            <p>Quantity: <b>{{$tra->itemQuantity}}</b></p>
                            <p>Current Total: <b>Rp{{number_format($tra->itemQuantity * $tra->pizza->pizzaPrice,2,',','.')}}</b></p>
                            <p>Description: <b>{{$tra->pizza->pizzaDetail}}</b></p>
                                <form action="{{'/updateQuantity/' . $tra->id}}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <div style="margin-top: 0.6em; margin-right: 0.6em;">
                                            <p>Quantity : </p>
                                        </div>
                                        <div class="col-xd-2">
                                            <input type="number" class="form-control input-sm" id="quantity" name = "quantity" placeholder="Minimal 1." >
                                        </div>
                                    </div>

                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary " style="margin-top: 1em; text-align:center;">Update Pizza</button>
                                    <a href="{{'/deleteCart/' . $tra->id}}" type="button" class="btn btn-danger" style="margin-top: 1em; text-align:center;">Delete Pizza</a>
                                </form>
                        </div>
                    </div>
                @endforeach
                {{-- Display curent subtotal --}}
                <p class="text-center">Total Payment: <br><b>Rp{{number_format($currentTotalProd,2,',','.')}}</b></p>
            </div>

            {{-- If cart not emtpy, display checkout and its functionality --}}
            @if(count($transactionItem) != 0)
                <form action="{{url('/checkout')}}" method="post">
                    @csrf
                    <div class="text-center" style="margin-top: 2em;">
                        <button type="submit" class="btn btn-dark align-center">Checkout</button>
                    </div>
                </form>
            @endif

        {{-- Error Display --}}
        @else
            <h1 class="col-6 offset-5">Access Denied</h1>
        @endif
    @endif
@endsection
