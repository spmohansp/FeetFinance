<?php

namespace App\Http\Controllers\ClientsControllers;

use Illuminate\Support\Facades\Auth;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function __construct(){
        $this->middleware('client');
    }

    public function show(){
        return view('client.masters.staff.show');
    }

    public function add(){
        return view('client.masters.staff.add');
    }

    public function view($id){
        try {
            $staff = Staff::findOrfail($id);
            return view('client.masters.staff.view', compact('staff'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function save(){
       $StaffData=Staff::where([['clientid',Auth::user()->id],['mobile1',request('mobile1')]])->first();
        if(!empty($StaffData->mobile1)){
            return back()->with('danger','Staff Already Added!!')->withInput();
        }
        try {
            Staff::create([
                'name' => request('name'),
                'mobile1' => request('mobile1'),
                'mobile2' => request('mobile2'),
                'address' => request('address'),
                'licenceNumber' => request('licenceNumber'),
                'type' => request('type'),
                'clientid' => auth()->user()->id,
            ]);
            return back()->with('succcess','Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function edit($id){
        try{
            $staff = Staff::findOrfail($id);
            return view('client.masters.staff.edit',compact('staff'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function update($id){
        $staff = Staff::findOrfail($id);
        $staff->name = request('name');
        $staff->mobile1 = request('mobile1');
        $staff->mobile2 = request('mobile2');
        $staff->address = request('address');
        $staff->licenceNumber = request('licenceNumber');
        $staff->type = request('type');
        $staff->save();
        return back()->with('success','Staff Updated Sucessfully!');
    }

    public function delete($id){
        $Request = Staff::findOrfail($id);
        try {
            $Request->delete();
            return redirect('client/staff')->with('success','Staff Deleted Sucessfully!');
        } catch (\Illuminate\Database\QueryException $e) {
             return back()->with('danger','Something went wrong! Delete Not Allowed!');
        }  
    }
}
