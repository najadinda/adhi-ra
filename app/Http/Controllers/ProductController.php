<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class ProductController extends Controller
{
    public function index(Request $request) {
        // $search = $request->input('search');
        // $products = Products::when($search, function ($query, $search) {
        //     return $query->where('product_name', 'like', "%{$search}%")
        //                  ->orWhere('description', 'like', "%{$search}%");
        // })->get();
        $products = Products::all();
        return view('pages.products.index', compact('products'));
    }
}
