@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('/index.css')}}">

{{-- If admin, can access this blade, else access denied --}}
    <div class="container">
        @if (Auth::check())
            @if(Auth::user()->role =='Admin')
            {{-- Show transaction user list --}}
                @foreach($transactionGet as $tGet)
                    <a href="{{'/history/' . $tGet->id}}" class="">
                        <div class="card-header bg-danger" style="color:white; margin-bottom:2em;" >
                            Transaction at {{$tGet->created_at}} <br>
                            User Id : {{$tGet->user_id}} <br>
                            Username : {{$tGet->user->username}} <br>
                        </div>
                    </a>
                @endforeach
            @else
            <h1 class="col-6 offset-5">Access Denied</h1>
            @endif
        @endif
    </div>
@endsection
