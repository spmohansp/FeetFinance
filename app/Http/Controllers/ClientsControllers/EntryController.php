<?php

namespace App\Http\Controllers\ClientsControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entry;
use App\Client;
use App\StaffsWork;
use App\LoadType;
use Illuminate\Support\Facades\Auth; 

class EntryController extends Controller
{
    public function __construct(){
        $this->middleware('client');
    }

    public function viewEntry(){
        return view('client.entry.view_entry');
    }

    public function add(){
        $loadTypes=LoadType::get()->all();
        return view('client.entry.add',compact('loadTypes'));
    }

    public function save(){
        $entry = new Entry;
        $entry->dateFrom=request()->dateFrom;
        $entry->dateTo=request()->dateTo;
        $entry->vehicleId=request()->vehicleId;
        $entry->customerId=request()->customerId;
        $entry->startKm=request()->startKm;
        $entry->endKm=request()->endKm;
        $entry->total=request()->total;
        $entry->locationFrom=request()->locationFrom;
        $entry->locationTo=request()->locationTo;
        $entry->loadType=request()->loadType;
        $entry->ton=request()->ton;
        $entry->billAmount=request()->billAmount;
        $entry->advance=request()->advance;
        $entry->comission=request()->comission;
        $entry->loadingMamool=request()->loadingMamool;
        $entry->unLoadingMamool=request()->unLoadingMamool;
        $entry->balance=request()->balance;
        $entry->clientid=auth()->user()->id;
        $entry->save();
        foreach (array_unique(request()->staff) as $key => $staffid) {
            if(!empty($staffid)){
                $StaffsWork = new StaffsWork;
                $StaffsWork->staffId=$staffid;
                $StaffsWork->entryId=$entry->id;
                $StaffsWork->save();
            }
        }
        return back()->with('success','Entry Added Sucessfully!');
    }

    public function showOne($id){
        try {
            $entry = Entry::findOrfail($id);
            $loadTypes=LoadType::get()->all();
            return view('client.entry.show',compact('entry','loadTypes'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }


    public function editEntry($id){
        $entry = Entry::findOrfail($id);
         $loadTypes=LoadType::get()->all();
        return view('client.entry.edit',compact('entry','loadTypes'));
    }

    public function delete($id){
        $StaffsWork= StaffsWork::where('entryId',$id)->get();
        try {
            foreach ($StaffsWork as $key => $value) {
                StaffsWork::find($value->id)->delete();
            }
             Entry::findOrfail($id)->delete();
            return redirect('client/viewentry')->with('success','Entry Deleted Sucessfully!');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');
        }
    }



    public function updateEntry($id){
        $entry = Entry::findOrfail($id);
        $entry->dateFrom=request()->dateFrom;
        $entry->dateTo=request()->dateTo;
        $entry->vehicleId=request()->vehicleId;
        $entry->customerId=request()->customerId;
        $entry->startKm=request()->startKm;
        $entry->endKm=request()->endKm;
        $entry->total=request()->total;
        $entry->locationFrom=request()->locationFrom;
        $entry->locationTo=request()->locationTo;
        $entry->loadType=request()->loadType;
        $entry->ton=request()->ton;
        $entry->billAmount=request()->billAmount;
        $entry->advance=request()->advance;
        $entry->comission=request()->comission;
        $entry->loadingMamool=request()->loadingMamool;
        $entry->unLoadingMamool=request()->unLoadingMamool;
        $entry->balance=request()->balance;
        $entry->clientid=auth()->user()->id;
        $entry->save();
        
        $StaffsWorkUpdateData = array_unique(request()->staff);

        $StaffsWork= StaffsWork::where('entryId',$id)->get()->toArray();
        $StaffsWorkArray=array_column($StaffsWork, 'staffId');

        if(!empty($StaffsWorkUpdateData)){
            // INSERT NEW STAFF ENTRY DATA
            foreach ($StaffsWorkUpdateData as $key => $staffid) {
                if(!empty($staffid) && !in_array($staffid, $StaffsWorkArray)){
                    $StaffsWork = new StaffsWork;
                    $StaffsWork->staffId=$staffid;
                    $StaffsWork->entryId=$entry->id;
                    $StaffsWork->save();
                }
            }
        }
        if(!empty($StaffsWorkArray)){
            // REMOVE DATA NOT SELECTED
            foreach ($StaffsWorkArray as $key => $staffid) {
                if(!empty($staffid) && !in_array($staffid, $StaffsWorkUpdateData)){
                    echo $staffid.' to be remove';
                    StaffsWork::where([['staffId',$staffid],['entryId',$entry->id]])->first()->delete();
                }
            }
        }
        
        return back()->with('success','Entry Updated Sucessfully!');


    }






}

