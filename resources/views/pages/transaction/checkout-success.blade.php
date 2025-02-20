@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="max-w-2xl mx-auto text-center">
        <div class="mb-8">
            <svg class="w-16 h-16 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        
        <h1 class="text-3xl font-bold mb-4">Thank you for your order!</h1>
        <p class="text-lg mb-8">Your order has been placed successfully. We've sent a confirmation to your email.</p>
        
        <div class="bg-gray-50 p-6 rounded-lg mb-8">
            <p class="font-medium">Order Number:</p>
            <p class="text-2xl font-bold mb-4">#92939</p>
            
            <div class="flex justify-between items-center mb-2">
                <span>Date:</span>
                <span>Kamis, 20 Feb 2025</span>
            </div>
            
            <div class="flex justify-between items-center mb-2">
                <span>Total:</span>
                <span class="font-bold">Rp 50.000</span>
            </div>
            
            <div class="flex justify-between items-center">
                <span>Payment Method:</span>
                <span>bca</span>
            </div>
        </div>
        
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="{{ route('cart.index') }}" class="bg-gray-900 text-white py-3 px-6 rounded-md hover:bg-gray-800 transition-colors">
                Back to cart
            </a>
        </div>
        {{-- <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="{{ route('order.tracking', ['order_id' => $order->id]) }}" class="bg-gray-900 text-white py-3 px-6 rounded-md hover:bg-gray-800 transition-colors">
                Track Order
            </a>
            <a href="{{ route('shop.index') }}" class="bg-white border border-gray-300 text-gray-800 py-3 px-6 rounded-md hover:bg-gray-50 transition-colors">
                Continue Shopping
            </a>
        </div> --}}
    </div>
</div>
@endsection