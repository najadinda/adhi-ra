@extends('layouts.layout')

@section('content')
@include('partials.navbar')

<div class="container mx-auto px-4 py-8 mb-10">
    <!-- Search Bar -->
    <div class="flex justify-end mt-4 mb-16">
        <form action="{{ route('products') }}" method="GET" class="flex items-center border border-black rounded-lg">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" 
                class="px-3 py-2 rounded-l-lg focus:outline-none">
            <button type="submit" class="px-3 py-2 text-black rounded-r-lg -ml-px">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Product List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-14 gap-y-14">
        @foreach ($products as $product)
            <div class="bg-primary p-6 rounded-lg shadow-lg gap-y-8">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" 
                    class="w-full h-48 object-cover mb-4 rounded-md">
                <h2 class="text-xl text-white font-semibold font-poppins mb-2">{{ $product->product_name }}</h2>
                <p class="text-lg text-white font-medium font-poppins mb-2">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-base text-white font-normal font-poppins mb-2">Stock: {{ $product->stock }}</p>
                <div class="flex justify-center mt-6 gap-3">
                    <a href="{{ route('products.detail', $product->id) }}" class="px-2 py-2 bg-white rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-primary">
                            <path fill="currentColor" d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                        </svg>
                    </a>
                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button class="bg-white text-black font-poppins font-medium px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 flex items-center gap-3">
                            <span>Add to Cart</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex flex-col items-center mt-10">
        {{ $products->links() }}
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

@include('partials.footer')
@endsection