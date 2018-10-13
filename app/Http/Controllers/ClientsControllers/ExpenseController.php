<?php

namespace App\Http\Controllers\ClientsControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function add(){
    	return view('client.expense.add');
    }


    public function save(){
    	return request()->all();
    }
}
