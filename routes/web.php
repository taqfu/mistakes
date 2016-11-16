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
use App\Mistake;
Route::get('/', function () {
    Mistake::total_due();
    return view('Mistake.index', [
        "mistakes"=>Mistake::orderBy('updated_at', 'desc')->get(),
    ]);
});

Route::resource('mistake', 'MistakeController');
Route::resource('incident', 'IncidentController');
