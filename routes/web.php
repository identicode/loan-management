<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('borrower.index'));
});

Route::group(['prefix' => 'borrower'], function () {

    Route::get('/', 'BorrowerController@index')->name('borrower.index');
    Route::get('/create', 'BorrowerController@create')->name('borrower.create');
    Route::post('/', 'BorrowerController@store')->name('borrower.store');

    Route::get('/{id}', 'BorrowerController@show')->name('borrower.show');

    Route::get('/{id}/edit', 'BorrowerController@edit')->name('borrower.edit');
    Route::patch('/{id}', 'BorrowerController@update')->name('borrower.patch');

    Route::get('/{id}/delete', 'BorrowerController@destroy')->name('borrower.destroy');

});


Route::group(['prefix' => 'loan'], function () {

    Route::get('/{id}/show', 'LoanController@show')->name('loan.show');

    Route::get('/{id}/add', 'LoanController@create')->name('loan.create');
    Route::post('/{id}/store', 'LoanController@store')->name('loan.store');


    Route::get('/{id}/payment', 'LoanController@payment')->name('loan.payment');
    Route::post('/{id}/payment', 'LoanController@paid')->name('loan.paid');

    Route::get('/{id}/delete', 'LoanController@destroy')->name('loan.delete');

});




