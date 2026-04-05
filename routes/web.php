<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//use Illuminate\Support\Facades\Route; 

Route::get('/contacto', function () {
    // Busca el archivo contacto.blade.php dentro de la carpeta resources/views/front/
    return view('front.contacto'); 
}) ->name('contacto');

Route::get('/', function () {
    return view('front.inicio');
}) ->name('inicio');