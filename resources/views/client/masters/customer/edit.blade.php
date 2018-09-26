@extends('client.layout.master')

@section('header')
    Edit Customer
@endsection

@section('customer')
    is-active
@endsection

@section('content')
    <form action="{{ route('client.updatecustomer', $customer->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-name">Name</label>
                    <input class="c-input" type="text" value="{{$customer->name}}" name="name" id="customer-name">
                </div>

                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-address">Address</label>
                    <input class="c-input" type="text" value="{{$customer->address}}" name="address" id="customer-address">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-phone">Phone Number</label>
                    <input class="c-input" type="tel" value="{{$customer->mobile}}" name="mobile" id="customer-phone">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-type">Type</label>
                    <select class="c-input" name="type" id="customer-type">
                        <option value="broker" <?php if($customer->type=='broker'){ echo 'selected';} ?>>Broker</option>
                        <option value="direct" <?php if($customer->type=='direct'){ echo 'selected';} ?>>Direct</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--primary c-btn--fullwidth">Update Customer</button>
        </div>
    </form>

@endsection
