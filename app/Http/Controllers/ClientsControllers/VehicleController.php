<?php

namespace App\Http\Controllers\ClientsControllers;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    public function __construct(){
        $this->middleware('client');
    }

    public function show(){
        return view('client.masters.vehicle.show');
    }

    public function add(){
        return view('client.masters.vehicle.add');
    }

    public function view($id){
        try {
            $vehicle = Vehicle::findOrfail($id);

//            dd($vehicle);
            return view('client.masters.vehicle.view', compact('vehicle'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function save(){
        try {
            Vehicle::create([
                'ownerName' => request('ownerName'),
                'vehicleNumber' => request('vehicleNumber'),
                'vehicleName' => request('vehicleName'),
                'vehicleType' => request('vehicleType'),
                'clientid' => auth()->user()->id,
            ]);
            return back()->with('succcess','Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function edit($id){
        try{
            $vehicle = Vehicle::findOrfail($id);
            return view('client.masters.vehicle.edit',compact('vehicle'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function update($id){
        $vehicle = Vehicle::findOrfail($id);
        $vehicle->ownerName = request('ownerName');
        $vehicle->vehicleNumber = request('vehicleNumber');
        $vehicle->vehicleName = request('vehicleName');
        $vehicle->vehicleType = request('vehicleType');
        $vehicle->save();
        return back()->with('success','Vehicle Updated Sucessfully!');
    }

    public function delete($id){
        $Request = Vehicle::findOrfail($id);
        try {
            $Request->delete();
            return redirect('client/vehicle');
        } catch (\Illuminate\Database\QueryException $e) {
             return back()->with('danger','Something went wrong! Delete Not Allowed!');
        }     
    }
}
