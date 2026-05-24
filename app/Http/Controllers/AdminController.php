<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController
{
    public function index() 
    {
        return view('admin.dashboard'); 
    }
}
