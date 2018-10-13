@extends('admin.layout.master')

@section('header')
    Add Vehicle Type
@endsection

@section('vehicleType')
    is-active
@endsection

@section('add_button')
    
@endsection

@section('content')

     <form action="{{ route('admin.addVehicleType') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle_type">Vehicle Type</label>
                    <input class="c-input" type="text" value="{{ old('vehicleType') }}" name="vehicleType" id="vehicle_type">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
        </div>
    </form>

@endsection