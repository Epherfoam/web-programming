@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Order newly</h1>
        <div class="col-10">
            <div class="card-deck">
                @foreach()
                <div class="card">
                    <img src="..." class="card-img-top" alt="Pizza Picture">
                    <div class="card-body">
                      <h5 class="card-title">Pizza Item</h5>
                      <p class="card-text">$Price</p>
                    </div>
                  </div>

                @endforeach
              </div>

            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}


            </div>
        </div>
    </div>
</div>
@endsection
