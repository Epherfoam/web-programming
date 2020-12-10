@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger" style="color:white;">{{ __('Add pizza') }}</div>

                <form action="{{route('pizzaAdds')}}" style="padding-top:2em" method="post" enctype="multipart/form-data">

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
                        <div class="col-md-6">
                            <input type="file" class="form-control-file @error('pizzaPhoto') is-invalid @enderror" name="pizzaPhoto" value="{{ old('pizzaPhoto') }}" required autocomplete="pizzaPhoto">
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

                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

