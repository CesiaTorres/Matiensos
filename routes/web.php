<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('front.inicio');
}) ->name('inicio');


Route::get('/contacto', function () {
    return view('front.contacto'); 
}) ->name('contacto');

Route::get('/quienes-somos', function () {
    return view('front.quienes-somos');
}) ->name('quienes-somos');


Route::get('/login', function () {
    return view('front.login');
}) ->name('login');

Route::get('/register', function () {
    return view('front.register');
}) ->name('register');



Route::get('/productos', function () {
    return view('front.products');
}) ->name('productos');