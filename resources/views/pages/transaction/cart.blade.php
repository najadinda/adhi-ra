@extends('layouts.layout')

@section('content')

<div class="container mx-auto py-12 px-4">
    <h1 class="text-2xl lg:text-3xl font-poppins font-semibold mb-10 flex items-center">
        <a href="javascript:history.back()" class="mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 lg:h-6 lg:w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        Keranjang
    </h1>

    <div class="flex flex-col lg:flex-row gap-8">
        <div class="w-full lg:w-2/3">
            @if(count($cart) > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 text-left">
                            <th class="pb-3 font-medium text-gray-700">PRODUCT</th>
                            <th class="pb-3 font-medium text-gray-700 text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $product)
                        <tr class="border-b border-gray-200 py-6">
                            <td class="py-6">
                                <div class="flex items-center">
                                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-24 h-24 object-cover mr-6">
                                    <div>
                                        <h3 class="font-medium text-gray-800">{{ $product['name'] }}</h3>
                                        <p class="text-gray-500 mt-1">Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                                        <div class="flex flex-col items-start mt-4">
                                            <div class="flex items-center">
                                                <button class="decrease-quantity px-2 py-1 bg-gray-200 rounded-l" data-id="{{ $id }}">-</button>
                                                <input type="number" value="{{ $product['quantity'] }}" min="1" class="item-quantity w-12 text-center py-1 border-t border-b border-gray-200" data-id="{{ $id }}">
                                                <button class="increase-quantity px-2 py-1 bg-gray-200 rounded-r" data-id="{{ $id }}">+</button>
                                            </div>
                                        
                                            <form action="{{ route('cart.destroy', $id) }}" method="POST" class="mt-5">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 text-sm">Remove item</button>
                                            </form>
                                        </div>                                        
                                    </div>
                                </div>
                            </td>
                            <td class="text-right item-subtotal" data-id="{{ $id }}">
                                Rp{{ number_format($product['price'] * $product['quantity'], 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-500 mb-6">Your cart is empty</p>
            </div>
            @endif
        </div>

        <div class="w-full lg:w-1/3">
            <div class="bg-gray-50 p-6 rounded">
                <h2 class="text-lg font-medium mb-4">CART TOTALS</h2>

                <div class="border-b border-gray-200 py-3 flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-medium cart-subtotal">Rp{{ number_format(array_reduce($cart, function($carry, $item) { return $carry + ($item['price'] * $item['quantity']); }, 0), 0, ',', '.') }}</span>
                </div>

                <div class="py-3 flex justify-between">
                    <span class="text-xl font-medium">Total</span>
                    <span class="text-xl font-medium cart-total">Rp{{ number_format(array_reduce($cart, function($carry, $item) { return $carry + ($item['price'] * $item['quantity']); }, 0), 0, ',', '.') }}</span>
                </div>

                <button class="w-full mt-6 bg-gray-800 text-white py-3 rounded hover:bg-gray-700 transition-colors" 
                        {{ count($cart) > 0 ? '' : 'disabled' }} onclick="window.location.href='{{ route('checkout.success') }}'">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                let input = document.querySelector(`.item-quantity[data-id="${id}"]`);
                let newValue = parseInt(input.value) + 1;
                input.value = newValue;
                updateCart(id, newValue);
            });
        });

        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                let input = document.querySelector(`.item-quantity[data-id="${id}"]`);
                let newValue = parseInt(input.value) - 1;
                if (newValue < 1) newValue = 1; // Tidak boleh kurang dari 1
                input.value = newValue;
                updateCart(id, newValue);
            });
        });

        document.querySelectorAll('.item-quantity').forEach(input => {
            input.addEventListener('change', function () {
                let id = this.getAttribute('data-id');
                let newValue = parseInt(this.value);
                if (newValue < 1) {
                    this.value = 1;
                    newValue = 1;
                }
                updateCart(id, newValue);
            });
        });

        function updateCart(id, quantity) {
            fetch(`/cart/update/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.subtotal) {
                    document.querySelector('.cart-subtotal').textContent = `Rp${new Intl.NumberFormat('id-ID').format(data.subtotal)}`;
                    document.querySelector('.cart-total').textContent = `Rp${new Intl.NumberFormat('id-ID').format(data.total)}`;
                    document.querySelector(`.item-subtotal[data-id="${id}"]`).textContent = `Rp${new Intl.NumberFormat('id-ID').format(data.subtotal)}`;
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>

@endsection
