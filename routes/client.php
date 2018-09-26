<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('client')->user();

    //dd($users);

    return view('client.home');
})->name('home');

Route::get('/customer', 'ClientsControllers\CustomerController@show');
Route::get('/customer/add', 'ClientsControllers\CustomerController@add');
Route::get('/customer/{id}/view', 'ClientsControllers\CustomerController@view');
Route::post('/customer/add', 'ClientsControllers\CustomerController@save')->name('addcustomer');
Route::get('/customer/{id}/edit', 'ClientsControllers\CustomerController@edit')->name('editcustomer');
Route::post('/customer/{id}/edit', 'ClientsControllers\CustomerController@update')->name('updatecustomer');
Route::delete('/customer/{id}/delete', 'ClientsControllers\CustomerController@delete')->name('deletecustomer');

Route::get('/staff', 'ClientsControllers\StaffController@show');
Route::get('/staff/add', 'ClientsControllers\StaffController@add');
Route::get('/staff/{id}/view', 'ClientsControllers\StaffController@view');
Route::post('/staff/add', 'ClientsControllers\StaffController@save')->name('addstaff');
Route::get('/staff/{id}/edit', 'ClientsControllers\StaffController@edit')->name('editstaff');
Route::post('/staff/{id}/edit', 'ClientsControllers\StaffController@update')->name('updatestaff');
Route::delete('/staff/{id}/delete', 'ClientsControllers\StaffController@delete')->name('deletestaff');


Route::get('/vehicle', 'ClientsControllers\VehicleController@show');
Route::get('/vehicle/add', 'ClientsControllers\VehicleController@add');
Route::get('/vehicle/{id}/view', 'ClientsControllers\VehicleController@view');
Route::post('/vehicle/add', 'ClientsControllers\VehicleController@save')->name('addvehicle');
Route::get('/vehicle/{id}/edit', 'ClientsControllers\VehicleController@edit')->name('editvehicle');
Route::post('/vehicle/{id}/edit', 'ClientsControllers\VehicleController@update')->name('updatevehicle');
Route::delete('/vehicle/{id}/delete', 'ClientsControllers\VehicleController@delete')->name('deletevehicle');


Route::get('/document/{vehicleId}', 'ClientsControllers\DocumentsController@show')->name('document');
Route::get('/document/{vehicleId}/add', 'ClientsControllers\DocumentsController@add')->name('adddocument');
Route::POST('/document/{vehicleId}/add', 'ClientsControllers\DocumentsController@save')->name('savedocument');
Route::get('/document/{id}/view', 'ClientsControllers\DocumentsController@showdocument');
Route::get('/document/{id}/edit', 'ClientsControllers\DocumentsController@editdocument')->name('editdocument');
Route::post('/document/{id}/edit', 'ClientsControllers\DocumentsController@updatedocument')->name('updatedocument');
Route::delete('/document/{id}/delete', 'ClientsControllers\DocumentsController@delete')->name('deletedocument');


Route::get('/entry', 'ClientsControllers\EntryController@add');
Route::post('/entry', 'ClientsControllers\EntryController@save')->name('saveentry');
Route::delete('/entry/{id}/delete', 'ClientsControllers\EntryController@delete')->name('deletEntry');



Route::get('/viewentry', 'ClientsControllers\EntryController@viewEntry');
Route::get('/entry/{id}/view', 'ClientsControllers\EntryController@showOne');
Route::get('/entry/{id}/edit', 'ClientsControllers\EntryController@editEntry')->name('editEntry');
Route::post('/entry/{id}/edit', 'ClientsControllers\EntryController@updateEntry')->name('updateEntry');


