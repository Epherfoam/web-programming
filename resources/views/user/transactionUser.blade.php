@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('/index.css')}}">

    @if (Auth::check())
        @if(Auth::user()->role =='Member')
            @foreach($transactionGet as $tGet)
                <a href="{{'/history/' . $tGet->id}}" class=""><div class="card-header bg-danger" style="color:white;">Transaction at {{$tGet->created_at}}</div></a>
            @endforeach
                {{-- {{dd($transactionGet)}} --}}
        @else
        <h1 class="col-6 offset-5">Access Denied</h1>
        @endif
    @endif

@endsection
