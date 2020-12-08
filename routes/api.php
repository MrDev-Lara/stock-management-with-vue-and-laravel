<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('signup', 'AuthController@signup');
});

Route::ApiResource('/employee', 'Api\EmployeeController');
Route::ApiResource('/supplier', 'Api\SupplierController');
Route::ApiResource('/customer', 'Api\CustomerController');
Route::ApiResource('/catagory', 'Api\CatagoryController');
Route::ApiResource('/product', 'Api\ProductController');
Route::ApiResource('/expense', 'Api\ExpenseController');
Route::get('/monthlyexpense', 'Api\ExpenseController@thismonthexpense');
Route::Post('/salary/paid/{id}', 'Api\SalaryController@salaryPaid');
Route::get('/allsalary', 'Api\SalaryController@salary');
Route::get('/salary/view/{id}', 'Api\SalaryController@viewsalary');
Route::Post('stock/update/{id}', 'Api\ProductController@stockupdate');

