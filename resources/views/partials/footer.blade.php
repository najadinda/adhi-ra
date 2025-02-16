<!-- resources/views/partials/footer.blade.php -->

<footer class="bg-primary text-white py-8 h-full lg:h-80 content-center">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <!-- Kolom 1: About Section -->
            <div class="mb-6 md:mb-0">
                <img src="{{ asset('assets/footer.png') }}" alt="logo" class="w-32 sm:w-48 mb-6">
                <p class="text-white">
                    Adhi-Ra adalah toko alat jahit yang menyediakan perlengkapan berkualitas tinggi untuk semua kebutuhan menjahit Anda. Komitmen kami adalah pelayanan terbaik untuk Anda.
                </p>
            </div>

            <!-- Kolom 2: Dibagi menjadi 2 sub-kolom -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <!-- Sub-kolom 1: Navigation -->
                <div class="mb-6 md:mb-0">
                    <h4 class="text-xl font-semibold mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-white hover:text-secondary">Home</a></li>
                        <li><a href="#" class="text-white hover:text-secondary">Products</a></li>
                        <li><a href="#" class="text-white hover:text-secondary">Contact</a></li>
                    </ul>
                </div>

                <!-- Sub-kolom 2: Jam Operational -->
                <div>
                    <h4 class="text-xl font-semibold mb-4">Operational</h4>
                    <ul class="text-white space-y-2">
                        <li>Senin - Sabtu: 07.00 - 17.00</li>
                        <li>Minggu: 08.00 - 12.00</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="border-t border-white mt-8 pt-8 text-center white">
            <p>&copy; 2025 Adhi-Ra. All rights reserved.</p>
        </div>
    </div>
</footer>

