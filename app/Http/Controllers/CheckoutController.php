<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Exception;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $total = $subtotal;

        return view('pages.transaction.checkout', compact('cart', 'subtotal', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|in:cod,bca',
            'payment_proof' => 'required_if:payment_method,bca|image|mimes:jpeg,png,jpg|max:2048',
            'order_note' => 'nullable|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        DB::beginTransaction();
        try {
            $totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

            $paymentProof = null;
            if ($request->hasFile('payment_proof')) {
                $paymentProof = $request->file('payment_proof')->store('payment-proofs', 'public');
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_amount' => $totalAmount,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'cod' ? 'menunggu' : 'dibayar',
                'payment_proof' => $request->payment_method === 'bca' ? 'required|image|mimes:jpeg,png,jpg|max:2048' : 'nullable',
                'order_date' => now(),
                'status' => 'diproses',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'order_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'order_note' => $item['order_note'] ?? null,
                ]);
            }

            session()->forget('cart');
            DB::commit();

            // \Log::info('Checkout process executed.');
            // \Log::error('Cart Data: ' . json_encode($cart));

            return redirect()->route('checkout.success', $order->id);
        } catch (\Exception $e) {
            DB::rollBack();
            if ($paymentProof) {
                Storage::disk('public')->delete($paymentProof);
            }
            return back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }

    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('pages.transaction.checkout-success', compact('order'));
    }
}