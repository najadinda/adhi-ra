<nav class="bg-white shadow-md h-20 sm:h-24 content-center">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-4">
      <!-- Logo dan Navigation Links -->
      <div class="flex items-center space-x-6">
        <!-- Logo -->
        <div>
          <a href="/">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-32 sm:w-40">
          </a>
        </div>

        <!-- Navigation Links (Desktop) -->
        <div class="hidden md:flex space-x-6">
          <a href="#" class="text-gray-800 hover:text-gray-600">Products</a>
          <a href="#" class="text-gray-800 hover:text-gray-600">Contact</a>
        </div>
      </div>

      <!-- Cart, Profile & Mobile Menu Button -->
      <div class="flex items-center space-x-3">
        <!-- Cart Icon -->
        <a href="#" class="text-gray-800 hover:text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </a>

        <!-- Sign Up and Login Buttons -->
        @guest
          <div class="flex items-center space-x-3">
            <a href="{{ route('login') }}" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-hover transition duration-300">Login</a>
          </div>
        @else
          <!-- Profile Dropdown -->
          <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle flex items-center gap-1">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li><a>Profile</a></li>
              <li><a>Logout</a></li>
            </ul>
          </div>
        @endguest

        <!-- Hamburger Button -->
        <button id="mobile-menu-button" class="md:hidden text-gray-800 hover:text-gray-600 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden mt-4">
      <a href="#" class="block py-2 text-gray-800 hover:text-gray-600">Products</a>
      <a href="#" class="block py-2 text-gray-800 hover:text-gray-600">Contact</a> 
    </div>
  </div>
</nav>

<!-- JavaScript untuk Hamburger Menu dan Dropdown -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const profileButton = document.querySelector('.dropdown-end [role="button"]');
    const profileMenu = document.querySelector('.dropdown-end ul');

    // Toggle Mobile Menu
    mobileMenuButton.addEventListener('click', function (event) {
      event.stopPropagation();
      mobileMenu.classList.toggle('hidden');
    });

    // Toggle Profile Dropdown
    profileButton.addEventListener('click', function (event) {
      event.stopPropagation();
      profileMenu.classList.toggle('hidden');
    });

    // Tutup dropdown saat klik di luar
    document.addEventListener('click', function (event) {
      if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
        profileMenu.classList.add('hidden');
      }
      if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.add('hidden');
      }
    });
  });
</script>