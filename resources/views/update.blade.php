@extends('layouts.app')

@section('content')

@if (Auth::check())
    @if(Auth::user()->role =='Admin')
<div style="display: flex; flex-direction: row; padding-top:5rem; padding-left:6rem; ">
    <div style="flex: 1">
        <img style="width:425px; height:400px; object-fit:cover;" src="{{asset('storage/' . $pizzaId->pizzaPhoto)}}" alt="">
    </div>
    <div style="flex: 2; padding-right:14em; ">
        <h1 style="padding-left:2em; ">Edit Pizza</h1>

        <form action="{{url('/editedPizza/' . $pizzaId->id)}}" style="padding-top:2em" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                {{-- Pizza Name --}}
                <label for="pizzaName" class="col-md-4 col-form-label text-md-right " style="padding-bottom:2em;">{{ __('Pizza Name') }}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('pizzaName') is-invalid @enderror" name="pizzaName" value="{{ old('pizzaName') }}" required autocomplete="pizzaName">
                    @error('pizzaName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- Pizza Description --}}
                <label for="pizzaDetail" class="col-md-4 col-form-label text-md-right " style="padding-bottom:2em;">{{ __('Pizza Description') }}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('pizzaDetail') is-invalid @enderror" name="pizzaDetail" value="{{ old('pizzaDetail') }}" required autocomplete="pizzaDetail">
                    @error('pizzaDetail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- Pizza Price --}}
                <label for="pizzaPrice" class="col-md-4 col-form-label text-md-right " style="padding-bottom:2em;">{{ __('Pizza Price') }}</label>
                <div class="col-md-6">
                    <input type="number" class="form-control @error('pizzaPrice') is-invalid @enderror" name="pizzaPrice" value="{{ old('pizzaPrice') }}" required autocomplete="pizzaPrice">
                    @error('pizzaPrice')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Pizza Photo --}}
                <label for="pizzaPhoto" class="col-md-4 col-form-label text-md-right " style="padding-bottom:2em; ">{{ __('Pizza Photo') }}</label>
                <div class="col-md-6">value="{{ old('pizzaPhoto') }}"
                    <input type="file" class="form-control-file @error('pizzaPhoto') is-invalid @enderror" name="pizzaPhoto"  required autocomplete="pizzaPhoto">
                    @error('pizzaPhoto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Add Pizza</button>
                </div>
        </form>
    </div>
</div>
@else
    <h1 class="col-6 offset-5">Access Denied</h1>
@endif
@endif
@endsection
