<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function index()
    {
        $products = Product::all()->chunk(3);
        return view('plugins', compact('products'));
    }
}
