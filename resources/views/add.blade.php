@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger" style="color:white;">{{ __('Add pizza') }}</div>

                <form action="" style="padding-top:2em">

                    <div class="form-group row">
                        {{-- Pizza Name --}}
                        <label for="pizzaName" class="col-md-4 col-form-label text-md-right" style="padding-bottom:2em;">{{ __('Pizza Name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pizzaName" >
                        </div>

                        {{-- Pizza Description --}}
                        <label for="pizzaDetail" class="col-md-4 col-form-label text-md-right" style="padding-bottom:2em;">{{ __('Pizza Description') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pizzaDetail">
                        </div>

                        {{-- Pizza Price --}}
                        <label for="pizzaPrice" class="col-md-4 col-form-label text-md-right" style="padding-bottom:2em;">{{ __('Pizza Price') }}</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pizzaPrice">
                        </div>

                        <label for="pizzaDetail" class="col-md-4 col-form-label text-md-right" style="padding-bottom:2em; ">{{ __('Pizza Image') }}</label>
                        <div class="col-md-6">
                            <input type="file" class="custom-file-input" id="pizzaImage">
                            <label class="custom-file-label" for="pizzaImage">Choose file</label>
                        </div>

                        {{csrf_field()}}

                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Add Pizza</a>
                        </div>
                </form>

                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

