<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VehicleType;

class vehicleTypeController extends Controller
{
    public function show(){
    	$VehicleTypes=VehicleType::get()->all();
    	return view('admin.vehicleType.show',compact('VehicleTypes'));
    }


    public function add(){
    	return view('admin.vehicleType.add');
    }


    public function addVehicleType(){
    	try {
            VehicleType::create([
                'vehicleType' => request('vehicleType'),
            ]);
            return back()->with('success','Vehicle Type Added Sucessfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }



    public function editVehicleType($id){
    	try {
    		$vehicleType = VehicleType::findOrfail($id);
    		return view('admin.vehicleType.edit',compact('vehicleType'));
    	}catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function updateVehicleType($id){
    	try {
	    	$VehicleType = VehicleType::findOrfail($id);
	    	$VehicleType->vehicleType=request()->vehicleType;
	    	$VehicleType->save();
	    	return back()->with('success','Vehicle Type Updated Sucessfully!');
    	}catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function deleteVehicleType($id){
        try {
            VehicleType::findOrfail($id)->delete();
            return redirect('admin/vehicleType')->with('success','Vehicle Type Deleted Sucessfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
