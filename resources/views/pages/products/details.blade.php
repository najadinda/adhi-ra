@extends('layouts.layout')

@section('content')
@include('partials.navbar')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl lg:text-3xl font-poppins font-semibold mb-10 flex items-center">
        <a href="javascript:history.back()" class="mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 lg:h-6 lg:w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        Kembali
    </h1>

    <div class="mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="md:flex items-center">
            <div class="md:w-1/3">
                <img class="w-full h-auto object-cover" src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}">
            </div>
            <div class="md:w-2/3 p-6">
                <h2 class="text-3xl font-semibold text-black">{{ $product->product_name }}</h2>
                <div class="mt-4">
                    <strong class="text-xl">Harga:</strong> <span class="text-xl font-bold text-primary">Rp. {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
                <div class="mt-4 text-black">
                    <strong>Kategori:</strong> <span class="font-normal">{{ $product->category }}</span>
                </div>
                <div class="mt-4 text-black leading-8">
                    <strong>Deskripsi:</strong> <br> <p>{{ $product->description }}</p>
                </div>
                <div class="mt-4 text-black">
                    <strong>Stock:</strong> <span class="font-semibold">{{ $product->stock }}</span>
                </div>
                <div class="mt-6">
                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button class="bg-primary text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272"/>
                            </svg>
                            <span class="font-poppins font-medium">Add to Cart</span>
                        </button>
                    </form>
                    {{-- <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="bg-primary text-white px-6 py-3 rounded-sm hover:bg-green-600 transition duration-300 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272"/>
                            </svg>
                            <span>Add to Cart</span>
                        </button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Mencegah reload halaman
                let formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Product added to cart!");
                    } else {
                        alert("Failed to add product.");
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

@endsection
