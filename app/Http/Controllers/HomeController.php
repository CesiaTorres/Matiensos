<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->take(8)
            ->get();

        $categories = Category::all();

        return view('front.inicio', compact(
            'featuredProducts',
            'categories'
        ));
    }
}
