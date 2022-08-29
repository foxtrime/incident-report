<?php

use Illuminate\Http\Request;

Route::post('login', 'Api\ApiUserController@login');
Route::post('register', 'Api\ApiUserController@register');

Route::get('reporte', 'Api\ApiReporteController@index');
Route::post('reporte', 'Api\ApiReporteController@store');










