<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('/loadType', 'AdminControllers\EntryLoadType@show');
Route::get('/loadType/add', 'AdminControllers\EntryLoadType@add');
Route::post('/loadType/add', 'AdminControllers\EntryLoadType@addLoadType')->name('addLoadType');
Route::get('/loadType/{id}/edit', 'AdminControllers\EntryLoadType@editLoadType');
Route::post('/loadType/{id}/update', 'AdminControllers\EntryLoadType@updateLoadType')->name('updateLoadType');
Route::delete('/loadType/{id}/delete', 'AdminControllers\EntryLoadType@deleteLoadType')->name('deleteLoadType');






