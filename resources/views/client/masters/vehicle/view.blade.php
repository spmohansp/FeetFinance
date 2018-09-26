@extends('client.layout.master')

@section('header')
    View Vehicle
@endsection

@section('vehicle')
    is-active
@endsection


@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="{{ route('client.document', $vehicle->id) }}"><img class="c-avatar__img" src="https://png.icons8.com/ios/50/000000/document-filled.png"></a>
        </div>
    </div>
    &#32;&#32;
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="{{ route('client.editvehicle', $vehicle->id) }}"><img class="c-avatar__img" src="https://png.icons8.com/material-rounded/50/000000/pencil.png"></a>
        </div>
    </div>
@endsection


@section('content')



        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-ownername">Owner Name</label>
                    <input class="c-input" type="text" value="{{ $vehicle->ownerName }}" readonly name="ownerName" id="vehicle-ownername">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-number">Vehicle Number</label>
                    <input class="c-input" type="text" value="{{ $vehicle->vehicleNumber }}" readonly name="vehicleNumber" id="vehicle-number">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="vehicle-name">Vehicle Name</label>
                    <input class="c-input" type="text" value="{{ $vehicle->vehicleName }}" readonly name="vehicleName" id="vehicle-name">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-phone1">Wheel Type</label>
                    <select class="c-input" readonly disabled name="vehicleType" id="vehicle-type">
                        <option value="Open_Body_-_10_W" <?php if($vehicle->vehicleType=='Open_Body_-_10_W'){ echo 'selected';} ?> >Open Body - 10 W</option>
                        <option value="Open_Body_-_12_W" <?php if($vehicle->vehicleType=='Open_Body_-_12_W'){ echo 'selected';} ?> >Open Body - 12 W</option>
                        <option value="Open_Body_-_14_W" <?php if($vehicle->vehicleType=='Open_Body_-_14_W'){ echo 'selected';} ?> >Open Body - 14 W</option>
                        <option value="Pickup_Truck" <?php if($vehicle->vehicleType=='Pickup_Truck'){ echo 'selected';} ?> >Pickup Truck</option>
                        <option value="Reefer_Truck" <?php if($vehicle->vehicleType=='Reefer_Truck'){ echo 'selected';} ?> >Reefer Truck</option>
                        <option value="Trailer_-_10_W" <?php if($vehicle->vehicleType=='Trailer_-_10_W'){ echo 'selected';} ?> >Trailer - 10 W</option>
                        <option value="Trailer_-_12_W" <?php if($vehicle->vehicleType=='Trailer_-_12_W'){ echo 'selected';} ?> >Trailer - 12 W</option>
                        <option value="Trailer_-_14_W" <?php if($vehicle->vehicleType=='Trailer_-_14_W'){ echo 'selected';} ?> >Trailer - 14 W</option>
                        <option value="Trailer_-_22_W" <?php if($vehicle->vehicleType=='Trailer_-_22_W'){ echo 'selected';} ?> >Trailer - 22 W</option>
                        <option value="Truck_-_6_W" <?php if($vehicle->vehicleType=='Truck_-_6_W'){ echo 'selected';} ?> >Truck - 6 W</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <form action="{{ route('client.deletevehicle', $vehicle->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="c-btn c-btn--danger c-btn--fullwidth" onclick="return confirm('Are you sure?')">Delete Vehicle</button>
            </form>
        </div>

@endsection
