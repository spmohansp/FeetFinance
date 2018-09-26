@extends('client.layout.master')

@section('header')
    Add Vehicle
@endsection

@section('vehicle')
    is-active
@endsection


@section('content')
    <form action="{{ route('client.addvehicle') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-ownername">Owner Name</label>
                    <input class="c-input" type="text" name="ownerName" id="vehicle-ownername">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-number">Vehicle Number</label>
                    <input class="c-input" type="text" name="vehicleNumber" id="vehicle-number">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-name">Vehicle Name</label>
                    <input class="c-input" type="text" name="vehicleName" id="vehicle-name">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-phone1">Vehicle Type</label>
                    <select class="c-input" name="vehicleType" id="vehicle-type">
                        <option value="Open_Body_-_10_W">Open Body - 10 W</option>
                        <option value="Open_Body_-_12_W">Open Body - 12 W</option>
                        <option value="Open_Body_-_14_W">Open Body - 14 W</option>
                        <option value="Pickup_Truck">Pickup Truck</option>
                        <option value="Reefer_Truck">Reefer Truck</option>
                        <option value="Trailer_-_10_W">Trailer - 10 W</option>
                        <option value="Trailer_-_12_W">Trailer - 12 W</option>
                        <option value="Trailer_-_14_W">Trailer - 14 W</option>
                        <option value="Trailer_-_22_W">Trailer - 22 W</option>
                        <option value="Truck_-_6_W">Truck - 6 W</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
        </div>
    </form>

@endsection
