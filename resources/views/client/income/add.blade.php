@extends('client.layout.master')

@section('header')
    Add Income
@endsection

@section('income')
    is-active
@endsection

@section('content')
	
	 <form action="{{route('client.addIncome')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="income-dateFrom">Date</label>
                    <input class="c-input" type="date" max="<?php echo date('Y-m-d'); ?>" name="date" id="income-date">
                </div>
            </div>
            
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="income-staff1">Customer</label>
                    <select class="c-input" name="customerId" id="income-customer">
                        <option value="">Select Customer</option>
                        @foreach(Auth::user()->customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

             <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="income-discription">Discription</label>
                    <textarea class="c-input" min="0" name="discription" id="income-discription"></textarea>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
        </div>
    </form>

@endsection