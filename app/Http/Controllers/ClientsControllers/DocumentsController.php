<?php

namespace App\Http\Controllers\ClientsControllers;

use App\Document;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    public function __construct(){
        $this->middleware('client');
    }

    public function show($vehicleId){
        try {
            $vehicle = Vehicle::where('id', $vehicleId)->latest()->first();
            return view('client.masters.documents.show', compact('vehicle'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');;
        }
    }

    public function add($vehicleId){
        return view('client.masters.documents.add', compact('vehicleId'));
    }

    public function save($vehicleId){
        try {
            Document::create([
                'type' => request('type'),
                'duedate' => request('duedate'),
                'notifyBefore' => request('notifyBefore'),
                'interval' => request('interval'),
                'issuingCompany' => request('issuingCompany'),
                'amount' => request('amount'),
                'notes' => request('notes'),
                'vehicleId' => $vehicleId,
            ]);
            return back()->with('succcess','Added Successfully');
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');;
        }
    }

    public function showdocument($id){
        try{
            $document = Document::findOrfail($id)->first();
//            dd($document);
            return view('client.masters.documents.view', compact('document'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');;
        }
    }


    public function editdocument($id){
        try{
            $document = Document::findOrfail($id)->first();
//            dd($document);
            return view('client.masters.documents.edit', compact('document'));
        }catch (Exception $e){
            return back()->with('danger','Something went wrong!');;
        }
    }

    public function updatedocument($id){
        $document = Document::findOrfail($id);
        $document->type = request('type');
        $document->duedate = request('duedate');
        $document->notifyBefore = request('notifyBefore');
        $document->interval = request('interval');
        $document->issuingCompany = request('issuingCompany');
        $document->amount = request('amount');
        $document->notes = request('notes');
        $document->save();
        return back()->with('success','Documents Updated Sucessfully!');
    }

    public function delete($id){
        $Request = Document::findOrfail($id);

        $vehicleId = $Request->vehicleId;
        try {
           $Request->delete();
           return redirect('client/document/'.$vehicleId)->with('success','Document Deleted Sucessfully!');
        } catch (\Illuminate\Database\QueryException $e) {
             return back()->with('danger','Something went wrong! Delete Not Allowed!');
        }   
    }
}
