<?php

    Route::resource('branches','BranchController');
    Route::resource('companies','CompanyController');
    Route::resource('persons','PersonController');
    Route::get('companies/{id}/branches','CompanyController@getBranches');
    Route::post('companies/{id}/branches','CompanyController@storeBranch');
    Route::get('company/{companyId}/branches/{branchId}','CompanyController@getCompanyBranch');
    Route::patch('company/{companyId}/branches/{branchId}','CompanyController@updateCompanyBranch');
    Route::delete('company/{companyId}/branches/{branchId}','CompanyController@deleteCompanyBranch');

    Route::resource('countries', 'CountryController');
    Route::resource('states',    'StateController');
    Route::resource('cities',    'CityController');
