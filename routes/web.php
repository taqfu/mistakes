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
use App\TagType;
use App\Tag;
Route::get('/', function () {
    return view('Mistake.index', [
        "mistakes"=>Mistake::whereNull('deactivated_at')->
          orderBy('updated_at', 'desc')->get(),
        "tag_types"=>TagType::whereNull('deactivated_at')->orderBy('name', 'asc')->get(),
        "last_date"=>0,
        "this_week_cleared"=>false,
    ]);
});

Route::resource('mistake', 'MistakeController');
Route::resource('incident', 'IncidentController');
Route::resource('tag', 'TagController');
Route::resource('TagType', 'TagTypeController');
