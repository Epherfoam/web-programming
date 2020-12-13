@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('/index.css')}}">

@if(Auth::check())
    @if(Auth::user()->role =='Admin')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="card-deck">
                        <div class="row">
                            @foreach($users as $user)
                                <div class="col-auto" style="margin-bottom:2em; margin-top:2em;">
                                <div class="card">
                                        <div class="card-header bg-danger" style="color:white;">{{('User ID: ') . $user->id}}</div>
                                        <div class="card-body">
                                            <p class="text-md-left">{{('Username: ') . $user->username}}</p>
                                            <p class="text-md-left">{{('Email: ') . $user->email}}</p>
                                            <p class="text-md-left">{{('Address: ') . $user->address}}</p>
                                            <p class="text-md-left">{{('Phone Number: ') . $user->phoneNumber}}</p>
                                            <p class="text-md-left">{{('Gender: ') . $user->gender}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <h1 class="col-6 offset-5">Access Denied</h1>
        @endif
    @endif
@endsection
