@extends('client.layout.master')

@section('header')
    Fleet Finance Manager
@endsection

@section('viewentry')
    is-active
@endsection

@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="{{ route('client.editEntry',$entry->id)}}"><img class="c-avatar__img" src="https://png.icons8.com/material-rounded/50/000000/pencil.png"></a>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-dateFrom">From Date</label>
                    <input class="c-input" type="date" value="{{$entry->dateFrom}}" name="dateFrom" id="entry-dateFrom" disabled="">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-dateTo">To Date</label>
                    <input class="c-input" type="date" value="{{$entry->dateTo}}" name="dateTo" id="entry-dateTo" disabled="">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-vehicle">Vehicle</label>
                    <select class="c-input" name="vehicleId" id="entry-vehicle" disabled="">
                        <option value="">Select Vehicle</option>
                        @foreach(Auth::user()->vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" <?php if($vehicle->id==$entry->vehicleId){ echo "selected";} ?>>{{ $vehicle->vehicleNumber }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-customer">Customer</label>
                    <select class="c-input" name="customerId" id="entry-customer" disabled="">
                        <option value="">Select Customer</option>
                        @foreach(Auth::user()->customers as $customer)
                            <option value="{{ $customer->id }}" <?php if($customer->id ==$entry->customerId){ echo "selected";} ?>>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-staff1">Staff 1</label>
                    <select class="c-input" name="staff[]" id="entry-staff1" disabled="">
                        <option value="">Select Staff</option>
                        @foreach(Auth::user()->staffs as $staff)
                            <option value="{{ $staff->id }}" <?php if (isset($entry->getAllStaffs[0])){
									if($staff->id==$entry->getAllStaffs[0]->staffId){ echo "selected";}
							} ?> 
							>{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-staff2">Staff 2</label>
                    <select class="c-input" name="staff[]" id="entry-staff2" disabled="">
                        <option value="">Select Staff</option>
                        @foreach(Auth::user()->staffs as $staff)
                            <option value="{{ $staff->id }}" <?php if (isset($entry->getAllStaffs[1])){
									if($staff->id==$entry->getAllStaffs[1]->staffId){ echo "selected";}
							} ?> >{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-staff3">Staff 3</label>
                    <select class="c-input" name="staff[]" id="entry-staff3" disabled="">
                        <option value="">Select Staff</option>
                        @foreach(Auth::user()->staffs as $staff)
                            <option value="{{ $staff->id }}" <?php if (isset($entry->getAllStaffs[2])){
									if($staff->id==$entry->getAllStaffs[2]->staffId){ echo "selected";}
							} ?> >{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-startkm">Start KM</label>
                    <input type="number" class="c-input" value="{{$entry->startKm}}" name="startKm" id="entry-startkm" disabled="">
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-endkm">End KM</label>
                    <input type="number" class="c-input" value="{{$entry->endKm}}" name="endKm" id="entry-endkm" disabled="">
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-total">Total</label>
                    <input type="number" class="c-input" value="{{$entry->total}}" name="total" id="entry-total" disabled="">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-locationFrom">Location From</label>
                    <input type="text" class="c-input" name="locationFrom" value="{{$entry->locationFrom}}"  id="entry-locationFrom" disabled="">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-locationTo">Location To</label>
                    <input type="text" class="c-input" name="locationTo" value="{{$entry->locationTo}}"  id="entry-locationTo" disabled="">
                </div>
            </div>
            <div class="col-8">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-loadType">Load Type</label>
                    <select class="c-input" name="loadType" id="entry-loadType" disabled="">
                        <option value="">Select Load Type</option>
                        @foreach ($loadTypes as $loadType) 
                            <option value="{{$loadType->id}}" <?php if($entry->loadType==$loadType->id){echo 'selected';} ?>>{{$loadType->loadType}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-ton">Tons</label>
                    <input type="number" class="c-input" value="{{$entry->ton}}" name="ton" id="entry-ton" disabled="">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-billAmount">Bill Amount</label>
                    <input type="number" class="c-input" value="{{$entry->billAmount}}" name="billAmount" id="entry-billAmount" disabled="">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-advance">Advance</label>
                    <input type="number" class="c-input" value="{{$entry->advance}}" name="advance" id="entry-advance" disabled="">
                </div>
            </div>


            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-comission">Comission</label>
                    <input type="number" class="c-input" value="{{$entry->comission}}" name="comission" id="entry-comission" disabled="">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-loadingMamool">ஏற்றுக்கூலி</label>
                    <input type="number" class="c-input" value="{{$entry->loadingMamool}}" name="loadingMamool" id="entry-loadingMamool" disabled="">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-unLoadingMamool">இறக்குக்கூலி</label>
                    <input type="number" class="c-input" value="{{$entry->unLoadingMamool}}" name="unLoadingMamool" id="entry-unLoadingMamool" disabled="">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-balance">Balance</label>
                    <input type="number" class="c-input" value="{{$entry->balance}}" name="balance" id="entry-balance" disabled="">
                </div>
            </div>
        </div>


 <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <form action="{{route('client.deletEntry',$entry->id)}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="c-btn c-btn--danger c-btn--fullwidth" onclick="return confirm('Are you sure?')">Delete Entry</button>
            </form>
        </div>

@endsection