@extends('client.layout.master')

@section('header')
    Add Expense
@endsection

@section('expense')
    is-active
@endsection

@section('content')


  <form action="{{route('client.addExpense')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="expense-dateFrom">Date</label>
                    <input class="c-input" type="date" max="<?php echo date('Y-m-d'); ?>" name="date" id="expense-date">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="expense-type">Expense Type</label>
                    <select class="c-input" name="type" id="expense-type">
                    	<option value="">Select Expense</option>
                    	<option value="salary">Salary</option>
                    	<option value="diesel">Diesel</option>


                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="expense-vehicle">Vehicle</label>
                    <select class="c-input" name="vehicleId" id="expense-vehicle">
                        <option value="">Select Vehicle</option>
                        @foreach(Auth::user()->vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->vehicleNumber }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="expense-staff1">Staff</label>
                    <select class="c-input" name="staffId" id="expense-staff">
                        <option value="">Select Staff</option>
                        @foreach(Auth::user()->staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="expense-liter">Liter</label>
                    <input type="number" class="c-input" min="0" name="liter" id="expense-liter">
                </div>
            </div>

            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="expense-amount">Amount</label>
                    <input type="number" class="c-input" min="0" name="amount" id="expense-amount">
                </div>
            </div>
             <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="expense-discription">Discription</label>
                    <textarea class="c-input" min="0" name="discription" id="expense-discription"></textarea>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
        </div>
    </form>

@endsection
