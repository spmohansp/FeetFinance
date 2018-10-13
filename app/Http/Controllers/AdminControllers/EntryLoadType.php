<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoadType;


class EntryLoadType extends Controller
{


    public function show(){
    	$loadTypes=LoadType::get()->all();
    	return view('admin.LoadType.show',compact('loadTypes'));
    }


    public function add(){
    	return view('admin.LoadType.add');
    }

    public function addLoadType(){
    	try {
            LoadType::create([
                'loadType' => request('loadType'),
            ]);
            return back()->with('success','Load Type Added Sucessfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }


    public function editLoadType($id){
		try {
    		$LoadType = LoadType::findOrfail($id);
    		return view('admin.LoadType.edit',compact('LoadType'));
    	}catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }


    public function updateLoadType($id){
		try {
	    	$LoadType = LoadType::findOrfail($id);
	    	$LoadType->loadType=request()->loadType;
	    	$LoadType->save();
	    	return back()->with('success','Load Type Updated Sucessfully!');
    	}catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }


    public function deleteLoadType($id){
    	try {
    		LoadType::findOrfail($id)->delete();
    		return redirect('admin/loadType')->with('success','Load Type Deleted Sucessfully!');
    	}catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }
}
