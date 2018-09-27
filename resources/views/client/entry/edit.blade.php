@extends('client.layout.master')

@section('header')
    Fleet Finance Manager
@endsection

@section('customer')
    is-active
@endsection

@section('content')


    <form action="{{ route('client.updateEntry',$entry->id) }}" method="POST">
        {{ csrf_field() }}
 	<div class="row">
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-dateFrom">From Date</label>
                    <input class="c-input DateChange" type="date" value="{{$entry->dateFrom}}" name="dateFrom" id="entry-dateFrom">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-dateTo">To Date</label>
                    <input class="c-input DateChange" type="date" value="{{$entry->dateTo}}" name="dateTo" id="entry-dateTo">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-vehicle">Vehicle</label>
                    <select class="c-input" name="vehicleId" id="entry-vehicle">
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
                    <select class="c-input" name="customerId" id="entry-customer">
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
                    <select class="c-input" name="staff[]" id="entry-staff1">
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
                    <select class="c-input" name="staff[]" id="entry-staff2">
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
                    <select class="c-input" name="staff[]" id="entry-staff3">
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
                    <input type="number" class="c-input CalculateKm" min="0" value="{{$entry->startKm}}" name="startKm" id="entry-startkm">
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-endkm">End KM</label>
                    <input type="number" class="c-input CalculateKm" min="0" value="{{$entry->endKm}}" name="endKm" id="entry-endkm">
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-total">Total</label>
                    <input type="number" class="c-input" value="{{$entry->total}}" name="total" id="entry-totalkm" readonly="">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-locationFrom">Location From</label>
                    <input type="text" class="c-input" name="locationFrom" value="{{$entry->locationFrom}}"  id="entry-locationFrom">
                </div>
            </div>
            <div class="col-6">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-locationTo">Location To</label>
                    <input type="text" class="c-input" name="locationTo" value="{{$entry->locationTo}}"  id="entry-locationTo">
                </div>
            </div>
            <div class="col-8">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-loadType">Load Type</label>
                    <select class="c-input" name="loadType" id="entry-loadType">
                        <option value="">Select Load Type</option>
                        <option value="Books_or_Paper_Rolls" <?php if($entry->loadType=='Books_or_Paper_Rolls'){echo 'selected';} ?> >Books or Paper Rolls</option>
                        <option value="Building_Materials" <?php if($entry->loadType=='Building_Materials'){echo 'selected';} ?>>Building Materials</option>
                        <option value="cement" <?php if($entry->loadType=='cement'){echo 'selected';} ?>>Cement</option>
                        <option value="chemicals" <?php if($entry->loadType=='chemicals'){echo 'selected';} ?>>Chemicals</option>
                        <option value="Coal_and_Ash" <?php if($entry->loadType=='Coal_and_Ash'){echo 'selected';} ?>>Coal and Ash</option>
                        <option value="Crop_or_Agri_Products" <?php if($entry->loadType=='Crop_or_Agri_Products'){echo 'selected';} ?>>Crop or Agri Products</option>
                        <option value="Electronics_or_Consumer_Durables" <?php if($entry->loadType=='Electronics_or_Consumer_Durables'){echo 'selected';} ?>>Electronics or Consumer Durables</option>
                        <option value="Engineering_Goods" <?php if($entry->loadType=='Engineering_Goods'){echo 'selected';} ?>>Engineering Goods</option>
                        <option value="Fertilizers" <?php if($entry->loadType=='Fertilizers'){echo 'selected';} ?>>Fertilizers</option>
                        <option value="Fruits_and_Vegetables" <?php if($entry->loadType=='Fruits_and_Vegetables'){echo 'selected';} ?>>Fruits and Vegetables</option>
                        <option value="Granites_or_Marbel" <?php if($entry->loadType=='Granites_or_Marbel'){echo 'selected';} ?>>Granites or Marbel</option>
                        <option value="Household_Goods" <?php if($entry->loadType=='Household_Goods'){echo 'selected';} ?>>Household Goods</option>
                        <option value="Industrial_Equipments" <?php if($entry->loadType=='Industrial_Equipments'){echo 'selected';} ?>>Industrial Equipments</option>
                        <option value="Iron_Pipes_or_Steel_Materials" <?php if($entry->loadType=='Iron_Pipes_or_Steel_Materials'){echo 'selected';} ?>>Iron Pipes or Steel Materials</option>
                        <option value="Liquids_or_Oil_Drums" <?php if($entry->loadType=='Liquids_or_Oil_Drums'){echo 'selected';} ?>>Liquids or Oil Drums</option>
                        <option value="Machineries" <?php if($entry->loadType=='Machineries'){echo 'selected';} ?>>Machineries</option>
                        <option value="Packed_Foods" <?php if($entry->loadType=='Packed_Foods'){echo 'selected';} ?>>Packed_Foods</option>
                        <option value="Plastic_Industrial_Goods" <?php if($entry->loadType=='Plastic_Industrial_Goods'){echo 'selected';} ?>>Plastic Industrial Goods</option>
                        <option value="Plastic_Pipes" <?php if($entry->loadType=='Plastic_Pipes'){echo 'selected';} ?>>Plastic Pipes</option>
                        <option value="Printed_Books_or_Paper_Rolls" <?php if($entry->loadType=='Printed_Books_or_Paper_Rolls'){echo 'selected';} ?>>Printed Books or Paper Rolls</option>
                        <option value="Refrigerated_Goods" <?php if($entry->loadType=='Refrigerated_Goods'){echo 'selected';} ?>>Refrigerated Goods</option>
                        <option value="Rice_or_Agri_Products" <?php if($entry->loadType=='Rice_or_Agri_Products'){echo 'selected';} ?>>Rice or Agri Products</option>
                        <option value="Scraps" <?php if($entry->loadType=='Scraps'){echo 'selected';} ?>>Scraps</option>
                        <option value="Stones_or_Tiles" <?php if($entry->loadType=='Stones_or_Tiles'){echo 'selected';} ?>>Stones or Tiles</option>
                        <option value="Textiles" <?php if($entry->loadType=='Textiles'){echo 'selected';} ?>>Textiles</option>
                        <option value="Tyres_and_Rubber_Products" <?php if($entry->loadType=='Tyres_and_Rubber_Products'){echo 'selected';} ?>>Tyres and Rubber Products</option>
                        <option value="Vehicles_and_Rubber_Products" <?php if($entry->loadType=='Vehicles_and_Rubber_Products'){echo 'selected';} ?>>Vehicles and Rubber Products</option>
                        <option value="Others_or_General" <?php if($entry->loadType=='Others_or_General'){echo 'selected';} ?>>Others or General</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-ton">Tons</label>
                    <input type="number" class="c-input" min="0" value="{{$entry->ton}}" name="ton" id="entry-ton">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-billAmount">Bill Amount</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" value="{{$entry->billAmount}}" name="billAmount" id="entry-billAmount">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-advance">Advance</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" value="{{$entry->advance}}" name="advance" id="entry-advance">
                </div>
            </div>


            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-comission">Comission</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" value="{{$entry->comission}}" name="comission" id="entry-comission">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-loadingMamool">ஏற்றுக்கூலி</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" value="{{$entry->loadingMamool}}" name="loadingMamool" id="entry-loadingMamool">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-unLoadingMamool">இறக்குக்கூலி</label>
                    <input type="number" class="c-input calculateEntryValue" min="0" value="{{$entry->unLoadingMamool}}" name="unLoadingMamool" id="entry-unLoadingMamool">
                </div>
            </div>

            <div class="col-4">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="entry-balance">Balance</label>
                    <input type="number" class="c-input" value="{{$entry->balance}}" name="balance" id="entry-balance">
                </div>
            </div>
              <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
	            <button class="c-btn c-btn--info c-btn--fullwidth">Save</button>
	        </div>
        </div>

    </form>

@endsection