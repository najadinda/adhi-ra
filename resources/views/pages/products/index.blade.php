@extends('layouts.layout')

@section('content')
@include('partials.navbar')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    
    <!-- Search Bar -->
    <form action="{{ route('products.index') }}" method="GET" class="mb-6">
        <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" class="px-4 py-2 border rounded-lg">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
    </form>

    <!-- Product List -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover mb-4">
                <h2 class="text-xl font-semibold">{{ $product->product_name }}</h2>
                <p class="text-gray-600">{{ $product->description }}</p>
                <p class="text-lg font-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">Stock: {{ $product->stock }}</p>
                <button class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg">Add to Cart</button>
            </div>
        @endforeach
    </div>
</div>

@include('partials.footer')
@endsection