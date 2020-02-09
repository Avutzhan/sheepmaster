<?php
//just index route
Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');