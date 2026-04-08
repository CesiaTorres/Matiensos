<?php

use Illuminate\Support\Facades\Route;

Route::get('/contacto', function () {
    return view('front.contacto'); 
}) ->name('contacto');

Route::get('/', function () {
    return view('front.inicio');
}) ->name('inicio');

Route::get('/login', function () {
    return view('front.login');
}) ->name('login');

Route::get('/register', function () {
    return view('front.register');
}) ->name('register');

Route::get('/nosotros', function () {
    return view('front.nosotros');
}) ->name('nosotros');