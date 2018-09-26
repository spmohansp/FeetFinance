@extends('client.layout.master')

@section('header')
    Edit Staff
@endsection

@section('staff')
    is-active
@endsection

@section('content')
    <form action="{{ route('client.updatestaff', $staff->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-name">Name</label>
                    <input class="c-input" type="text" value="{{ $staff->name }}" name="name" id="staff-name">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-phone">Phone Number 1</label>
                    <input class="c-input" type="tel" value="{{ $staff->mobile1 }}" name="mobile1" id="staff-phone">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-phone1">Phone Number 2</label>
                    <input class="c-input" type="tel" value="{{ $staff->mobile2 }}" name="mobile2" id="staff-phone1">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-address">Address</label>
                    <input class="c-input" type="text" value="{{ $staff->address }}" name="address" id="staff-address">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-licenceNumber">Licence Number</label>
                    <input class="c-input" type="text" value="{{ $staff->licenceNumber }}" name="licenceNumber" id="staff-licenceNumber">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-type">Type</label>
                    <select class="c-input" name="type" id="staff-type">
                        <option value="">Select Type</option>
                        <option value="manager" <?php if($staff->type=='manager'){ echo 'selected';} ?> >Manager</option>
                        <option value="cleaner" <?php if($staff->type=='cleaner'){ echo 'selected';} ?> >Cleaner</option>
                        <option value="driver" <?php if($staff->type=='driver'){ echo 'selected';} ?> >Driver</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--primary c-btn--fullwidth">Update Staff</button>
        </div>
    </form>

@endsection
