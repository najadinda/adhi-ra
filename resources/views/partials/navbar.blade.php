<nav class="bg-white shadow-md h-20 sm:h-24 content-center relative">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-4">
      <!-- Logo dan Navigation Links -->
      <div class="flex items-center space-x-6">
        <div>
          <a href="/">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-32 sm:w-40">
          </a>
        </div>
        <div class="hidden md:flex space-x-6">
          <a href="{{ route('products') }}" 
            class="{{ request()->is('products*') ? 'text-primary font-medium' : 'text-black font-light' }} font-lexend hover:text-secondary">
            Products
          </a>
          <a href="{{ route('contact') }}" 
            class="{{ request()->is('contact*') ? 'text-primary font-medium' : 'text-black font-light' }} font-lexend hover:text-secondary">
            Contact
          </a>
        </div>
      </div>
      
      <!-- Icons & Menu -->
      <div class="flex items-center space-x-6 lg:mr-5">
        <a href="/cart" class="text-gray-800 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
          </svg>
        </a>
        
        @guest
          <a href="{{ route('login') }}" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-hover transition duration-300">Login</a>
        @else
          <details class="dropdown dropdown-end">
            <summary class="btn btn-ghost btn-circle flex items-center gap-1 cursor-pointer">
              <div class="relative flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-black font-normal text-base">{{ Auth::user()->name }}</span>
              </div>
            </summary>
            <ul class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li><a href="{{ route('profile.show') }}">Profile</a></li>
              <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </details>
        @endguest
        
        <!-- Hamburger -->
        <button id="mobile-menu-button" class="md:hidden text-gray-800 hover:text-gray-600 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden absolute left-0 top-full w-full bg-white shadow-md py-4">
      <a href="{{ route('products') }}" 
        class="block py-2 px-4 {{ request()->is('products*') ? 'text-primary font-medium' : 'text-black font-light' }} font-lexend hover:text-secondary">
        Products
      </a>
      <a href="{{ route('contact') }}" 
        class="block py-2 px-4 {{ request()->is('contact*') ? 'text-primary font-medium' : 'text-black font-light' }} font-lexend hover:text-secondary">
        Contact
      </a>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', function (event) {
      event.stopPropagation();
      mobileMenu.classList.toggle('hidden');
    });
    
    document.addEventListener('click', function (event) {
      if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.add('hidden');
      }
    });
  });
</script>