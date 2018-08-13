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
    $data = DB::table('arabic')->where('surah', 1)->where('ayat', 1)->first();
    return view('welcome', compact('data'));
});

Route::get('addQuran', [
	'uses'	=> 'surahController@add'
]);

Route::get('surah_insert', [
	'uses'	=> 'surahController@insert',
	'as'	=> 'surah.save'
]);

Route::post('surah_save', [
	'uses'	=> 'surahController@save',
	'as'	=> 'surah.save'
]);

Route::get('/surah_insert', [
	'uses'	=> 'surahController@insert',
	'as'	=> 'surah.save'
]);
