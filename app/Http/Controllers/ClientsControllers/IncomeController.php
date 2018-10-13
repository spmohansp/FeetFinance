<?php

namespace App\Http\Controllers\ClientsControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    public function add(){
    	return view('client.income.add');
    }

    public function save(){
    	return request()->all();
    }
}
