<?php

namespace App\Http\Controllers\ClientsControllers;

use Illuminate\Support\Facades\Auth; 
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('client');
    }

    public function show(){
        return view('client.masters.customer.show');
    }

    public function add(){
        return view('client.masters.customer.add');
    }

    public function view($id){
        try {
            $customer = Customer::findOrfail($id);
            return view('client.masters.customer.view', compact('customer'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');;
        }
    }

    public function save(){
        $CustomerData=Customer::where([['clientid',Auth::user()->id],['mobile',request('mobile')]])->first();
        if(!empty($CustomerData->mobile)){
            return back()->with('danger','Customer Already Added!!')->withInput();
        }
        try {
            Customer::create([
                'name' => request('name'),
                'mobile' => request('mobile'),
                'address' => request('address'),
                'type' => request('type'),
                'clientid' => auth()->user()->id,
            ]);
            return redirect('client/customer')->with('succcess','Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }

    public function edit($id){
        try{
            $customer = Customer::findOrfail($id);
            return view('client.masters.customer.edit',compact('customer'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');;
        }
    }

    public function update($id){
        $customer = Customer::findOrfail($id);
        $customer->name = request('name');
        $customer->address = request('address');
        $customer->mobile = request('mobile');
        $customer->type = request('type');
        $customer->save();
        return back()->with('success','Customer Updated Successfully');
    }

    public function delete($id){
        $Request = Customer::findOrfail($id);
        try {
            $Request->delete();
            return redirect('client/customer')->with('success','Customer Updated Successfully');
        } catch (\Illuminate\Database\QueryException $e) {
             return back()->with('danger','Something went wrong! Delete Not Allowed!');
        }   
    }
}