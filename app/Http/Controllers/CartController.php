<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Cart;
use App\Models\Products;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('pages.transaction.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
    
        // Ambil data produk dari database
        $product = Products::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }
    
        // Jika produk sudah ada di cart, tambahkan quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => Storage::url($product->product_image),
            ];
        }
    
        // Simpan ke session
        session()->put('cart', $cart);
    
        return response()->json(['success' => true, 'message' => 'Product added to cart', 'cart' => $cart]);
    }
    

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            $subtotal = array_sum(array_map(function($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));

            return response()->json([
                'subtotal' => $subtotal,
                'total' => $subtotal, // Biaya pengiriman
                'itemCount' => count($cart)
            ]);
        }
    }

    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed successfully.');
    }
}
