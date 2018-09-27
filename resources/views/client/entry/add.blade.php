@extends('client.layout.master')

@section('header')
    Add Entry
@endsection

@section('entry')
    is-active
@endsection


@section('content')

    <form action="{{ route('client.saveentry') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-dateFrom">From Date</label>
                    <input class="c-input DateChange" type="date" max="<?php echo date('Y-m-d'); ?>" name="dateFrom" id="entry-dateFrom">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label DateChange" for="entry-dateTo">To Date</label>
                    <input class="c-input" type="date" max="<?php echo date('Y-m-d'); ?>" name="dateTo" id="entry-dateTo">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-vehicle">Vehicle</label>
                    <select class="c-input" name="vehicleId" id="entry-vehicle">
                        <option value="">Select Vehicle</option>
                        @foreach(Auth::user()->vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->vehicleNumber }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-customer">Customer</label>
                    <select class="c-input" name="customerId" id="entry-customer">
                        <option value="">Select Customer</option>
                        @foreach(Auth::user()->customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-staff1">Staff 1</label>
                    <select class="c-input" name="staff[]" id="entry-staff1">
                        <option value="">Select Staff</option>
                        @foreach(Auth::user()->staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-staff2">Staff 2</label>
                    <select class="c-input" name="staff[]" id="entry-staff2">
                        <option value="">Select Staff</option>
                        @foreach(Auth::user()->staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-staff3">Staff 3</label>
                    <select class="c-input" name="staff[]" id="entry-staff3">
                        <option value="">Select Staff</option>
                        @foreach(Auth::user()->staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-startkm">Start KM</label>
                    <input type="number" class="c-input CalculateKm" min="0" name="startKm" id="entry-startkm">
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-endkm">End KM</label>
                    <input type="number" class="c-input CalculateKm" min="0" name="endKm" id="entry-endkm">
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-total">Total</label>
                    <input type="number" class="c-input" name="total" id="entry-totalkm" required="" readonly="">
                    <div id="ErrorTotal"></div>
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-locationFrom">Location From</label>
                    <input type="text" class="c-input" name="locationFrom" id="entry-locationFrom">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-locationTo">Location To</label>
                    <input type="text" class="c-input" name="locationTo" id="entry-locationTo">
                </div>
            </div>
            <div class="col-8">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-loadType">Load Type</label>
                    <select class="c-input" name="loadType" id="entry-loadType">
                        <option value="">Select Load Type</option>
                        <option value="Books_or_Paper_Rolls">Books or Paper Rolls</option>
                        <option value="Building_Materials">Building Materials</option>
                        <option value="cement">Cement</option>
                        <option value="chemicals">Chemicals</option>
                        <option value="Coal_and_Ash">Coal and Ash</option>
                        <option value="Crop_or_Agri_Products">Crop or Agri Products</option>
                        <option value="Electronics_or_Consumer_Durables">Electronics or Consumer Durables</option>
                        <option value="Engineering_Goods">Engineering Goods</option>
                        <option value="Fertilizers">Fertilizers</option>
                        <option value="Fruits_and_Vegetables">Fruits and Vegetables</option>
                        <option value="Granites_or_Marbel">Granites or Marbel</option>
                        <option value="Household_Goods">Household Goods</option>
                        <option value="Industrial_Equipments">Industrial Equipments</option>
                        <option value="Iron_Pipes_or_Steel_Materials">Iron Pipes or Steel Materials</option>
                        <option value="Liquids_or_Oil_Drums">Liquids or Oil Drums</option>
                        <option value="Machineries">Machineries</option>
                        <option value="Packed_Foods">Packed_Foods</option>
                        <option value="Plastic_Industrial_Goods">Plastic Industrial Goods</option>
                        <option value="Plastic_Pipes">Plastic Pipes</option>
                        <option value="Printed_Books_or_Paper_Rolls">Printed Books or Paper Rolls</option>
                        <option value="Refrigerated_Goods">Refrigerated Goods</option>
                        <option value="Rice_or_Agri_Products">Rice or Agri Products</option>
                        <option value="Scraps">Scraps</option>
                        <option value="Stones_or_Tiles">Stones or Tiles</option>
                        <option value="Textiles">Textiles</option>
                        <option value="Tyres_and_Rubber_Products">Tyres and Rubber Products</option>
                        <option value="Vehicles_and_Rubber_Products">Vehicles and Rubber Products</option>
                        <option value="Others_or_General">Others or General</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-ton">Tons</label>
                    <input type="number" class="c-input" min="0" name="ton" id="entry-ton">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-billAmount">Bill Amount</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" name="billAmount" id="entry-billAmount">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-advance">Advance</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" name="advance" id="entry-advance">
                </div>
            </div>


            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-comission">Comission</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" name="comission" id="entry-comission">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-loadingMamool">ஏற்றுக்கூலி</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" name="loadingMamool" id="entry-loadingMamool">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-unLoadingMamool">இறக்குக்கூலி</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" name="unLoadingMamool" id="entry-unLoadingMamool">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-balance">Balance</label>
                    <input type="number" class="c-input" min="0" name="balance" id="entry-balance" readonly="">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
        </div>
    </form>

@endsection
