@extends('client.layout.master')

@section('header')
    View Customer
@endsection

@section('customer')
    is-active
@endsection


@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="{{ route('client.editcustomer', $customer->id) }}"><img class="c-avatar__img" src="https://png.icons8.com/material-rounded/50/000000/pencil.png"></a>
        </div>
    </div>
@endsection


@section('content')
{{--{{$customer}}--}}

        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-name">Name</label>
                    <input class="c-input" type="text" value="{{$customer->name}}" name="name" id="customer-name" readonly>
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-address">Address</label>
                    <input class="c-input" type="text" value="{{$customer->address}}" name="address" id="customer-address" readonly>
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-phone">Phone Number</label>
                    <input class="c-input" type="tel" value="{{$customer->mobile}}" name="mobile" id="customer-phone" readonly>
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-type">Type</label>
                    <select class="c-input" name="type" id="customer-type" disabled readonly="">
                        <option value="broker" <?php if($customer->type=='broker'){ echo 'selected';} ?>>Broker</option>
                        <option value="direct" <?php if($customer->type=='direct'){ echo 'selected';} ?>>Direct</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <form action="{{ route('client.deletecustomer', $customer->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="c-btn c-btn--danger c-btn--fullwidth" onclick="return confirm('Are you sure?')">Delete Customer</button>
            </form>
        </div>

@endsection
