<?php

Route::get('countries','CountryController@getCountries');
Route::get('countries/{id}/states','CountryController@getStatesByCountry');
Route::get('states/{id}/cities','CountryController@getCitiesByState');

/*Route::group(['namespace' => '\Modules\Entity\Http\Controllers'], function()
{
    Route::resource(['branch', 'BranchController']);
});*/

//Route::resource(['branches','BranchController']);
