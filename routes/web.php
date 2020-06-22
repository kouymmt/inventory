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
Route::get('/','SettingController@index')->name('setting');
Route::post('/','SettingController@set')->name('setting_data');
Route::get('/csv_import', 'CsvImportController@index')->name('CsvImport_index');
Route::post('/csv_import', 'CsvImportController@CsvImport')->name('CsvImport');
Route::get('/tallsecretStock', 'TsDataController@index')->name('tallsecretStock');
Route::get('/scraping','ScrapingController@getdata')->name('scraping');
Route::get('/restart','RestartController@restart')->name('restart');
Route::get('/stockout','StockoutController@index')->name('Stockout');
Route::get('/stockadd','StockAddedController@index')->name('stockadded');