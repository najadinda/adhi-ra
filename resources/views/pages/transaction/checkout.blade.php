@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl lg:text-3xl font-poppins font-semibold mb-10 flex items-center">
        <a href="javascript:history.back()" class="mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 lg:h-6 lg:w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        Checkout
    </h1>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Products List (Left Side) -->
        <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
            
            @if(count($cart) > 0)
                @foreach($cart as $item)
                <div class="flex items-center py-4">
                    <div class="w-16 h-16 flex-shrink-0 overflow-hidden rounded-lg border">
                        <img src="{{ $item['image'] ?? asset('images/default.png') }}" 
                             alt="{{ $item['name'] }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="ml-4 flex-grow">
                        <h3 class="font-medium">{{ $item['name'] }}</h3>
                        <p class="text-gray-600 text-sm">Rp{{ number_format($item['price'], 0, ',', '.') }} × {{ $item['quantity'] }}</p>
                    </div>
                    <div class="font-semibold">
                        Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                    </div>
                </div>
                @endforeach

                <div class="mt-6 pt-4 border-t">
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between font-semibold text-lg">
                        <span>Total</span>
                        <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            @else
                <p class="text-gray-600">Your cart is empty</p>
            @endif
        </div>

        <!-- User Data (Right Side) -->
        <div class="w-full md:w-1/2">
            <form method="POST" action="{{ route('checkout.process') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- Tujuan Pengiriman -->
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <h2 class="text-xl font-semibold mb-4">Tujuan Pengiriman</h2>
                    
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pengirim</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            value="{{ auth()->user()->name ?? old('name') }}">
                    </div>
        
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            value="{{ auth()->user()->phone ?? old('phone') }}">
                    </div>
        
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea id="address" name="address" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            rows="3">{{ auth()->user()->address ?? old('address') }}</textarea>
                    </div>
                </div>
                
                <!-- Additional Notes -->
                <div class="mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="add_note" name="add_note" class="mr-2">
                        <label for="add_note" class="text-sm">Add a note to your order</label>
                    </div>
                    
                    <div id="note_container" class="hidden mt-3">
                        <textarea name="order_note" id="order_note" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            placeholder="Add any special instructions or requests..."></textarea>
                    </div>
                </div>
                
                <!-- Payment Options -->
                <div class="mb-6">
                    <label for="payment_method" class="block text-sm font-medium mb-2">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                        <option value="cod">Cash on Delivery</option>
                        <option value="bca">Bank BCA - 1234567890</option>
                    </select>
                </div>
                <div id="bukti_transfer" class="mb-6 hidden">
                    <label for="payment_proof" class="block text-sm font-medium">Upload Bukti Transfer</label>
                    <input type="file" id="payment_proof" name="payment_proof" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gray-900 text-white py-3 px-6 rounded-md hover:bg-gray-800 transition-colors"
                onclick="window.location.href='{{ route('checkout.index') }}'">
                    Proses Pesanan
                </button>
            </form>
        </div>
        
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Show/hide order note field
        document.getElementById('add_note').addEventListener('change', function() {
            document.getElementById('note_container').style.display = this.checked ? 'block' : 'none';
        });

        // Show/hide payment proof field
        document.getElementById('payment_method').addEventListener('change', function() {
            document.getElementById('bukti_transfer').style.display = this.value === 'bca' ? 'block' : 'none';
        });
    });
</script>

@endsection