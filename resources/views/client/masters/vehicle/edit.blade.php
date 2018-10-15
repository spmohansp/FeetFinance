@extends('client.layout.master')

@section('header')
    Edit Vehicle
@endsection

@section('vehicle')
    is-active
@endsection

@section('content')
    <form action="{{ route('client.updatevehicle', $vehicle->id) }}" method="POST">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-ownername">Owner Name</label>
                    <input class="c-input" type="text" value="{{ $vehicle->ownerName }}" name="ownerName" id="vehicle-ownername">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-number">Vehicle Number</label>
                    <input class="c-input" type="text" value="{{ $vehicle->vehicleNumber }}" name="vehicleNumber" id="vehicle-number">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-name">Vehicle Name</label>
                    <input class="c-input" type="text" value="{{ $vehicle->vehicleName }}" name="vehicleName" id="vehicle-name">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-phone1">Wheel Type</label>
                    <select class="c-input" name="vehicleType" id="vehicle-type">
                         <option value="">Select Vehicle Type</option>
                        @foreach($vehicleTypes as $vehicleType)
                            <option value="{{$vehicleType->id}}" <?php if($vehicle->vehicleType==$vehicleType->id){ echo 'selected';} ?>>{{$vehicleType->vehicleType}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--primary c-btn--fullwidth">Update Vehicle</button>
        </div>
    </form>

@endsection
