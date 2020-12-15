@extends('layouts.app')

@section('content')

{{-- Delete Pizza if it's an Admin--}}
    @if(Auth::check())
       @if(Auth::user()->role =='Admin')
       {{-- Display Flex liek detail page --}}
            <div style="display: flex; flex-direction: row; padding-top:5rem; padding-left:6rem; ">
                <div style="flex: 1">
                    <img style="width:425px; height:400px; object-fit:cover;" src="{{ asset('storage/' . $pizzaId->pizzaPhoto) }}" alt="">
                </div>
                <div style="flex: 2; padding-left:2em; ">
                    <h1>{{$pizzaId->pizzaName}}</h1>
                    <div class="text-muted" style="font-size: 30pt">Rp{{ number_format($pizzaId->pizzaPrice,2,',','.')}}</div>
                    <p>{{$pizzaId->pizzaDetail}}</p>
                    <a href="{{url('/delete/' . $pizzaId->id)}}" type="button" class="btn btn-danger align-middle" style=" text-align:center;">Delete Pizza</a>
                </div>
            </div>
        @else

        {{-- If non-admin, access denied --}}
        <h1 class="col-6 offset-5">Access Denied</h1>
        @endif
    @endif
@endsection
