<?php

use Illuminate\Support\Facades\Route;

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
// Homepage Route
Route::group(["middleware" => ["web"]], function () {
    Route::get("/", "CalendarController@index")->name("index");

    Route::post("calendar/addEvent", "CalendarController@addEvent")->name("calendar.addEvent");
    Route::get("calendar/getEvents", "CalendarController@getEvents")->name("calendar.getEvents");
});