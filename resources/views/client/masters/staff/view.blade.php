@extends('client.layout.master')

@section('header')
    View Customer
@endsection

@section('staff')
    is-active
@endsection


@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="{{ route('client.editstaff', $staff->id) }}"><img class="c-avatar__img" src="https://png.icons8.com/material-rounded/50/000000/pencil.png"></a>
        </div>
    </div>
@endsection


@section('content')


        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-name">Name</label>
                    <input class="c-input" type="text" value="{{ $staff->name }}" readonly name="name" id="staff-name">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-phone">Phone Number 1</label>
                    <input class="c-input" type="tel" value="{{ $staff->mobile1 }}" readonly name="mobile1" id="staff-phone">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-phone1">Phone Number 2</label>
                    <input class="c-input" type="tel" value="{{ $staff->mobile2 }}" readonly name="mobile2" id="staff-phone1">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-address">Address</label>
                    <input class="c-input" type="text" value="{{ $staff->address }}" readonly name="address" id="staff-address">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-licenceNumber">Licence Number</label>
                    <input class="c-input" type="text" value="{{ $staff->licenceNumber }}" readonly name="licenceNumber" id="staff-licenceNumber">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="staff-type">Type</label>
                    <select class="c-input" name="type" readonly disabled id="staff-type">
                        <option value="manager" <?php if($staff->type=='manager'){ echo 'selected';} ?> >Manager</option>
                        <option value="cleaner" <?php if($staff->type=='cleaner'){ echo 'selected';} ?> >Cleaner</option>
                        <option value="driver" <?php if($staff->type=='driver'){ echo 'selected';} ?> >Driver</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <form action="{{ route('client.deletestaff', $staff->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="c-btn c-btn--danger c-btn--fullwidth" onclick="return confirm('Are you sure?')">Delete Customer</button>
            </form>
        </div>

@endsection
