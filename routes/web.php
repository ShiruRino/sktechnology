<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/company-overview', function() {
    return view('about');
});
Route::get('/what-we-do', function() {
    return view('what-we-do');
});
Route::get('/timor-leste', function() {
    return view('timor-leste');
});
Route::get('/contacts', function() {
    return view('contacts');
});
