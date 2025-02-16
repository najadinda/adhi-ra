@extends('layouts.layout')

@section('content')
@include('partials.navbar')

<!-- Hero Section -->
<div class="hero min-h-20">
  <div class="container mx-auto flex flex-col lg:flex-row-reverse gap-60 items-center px-4 py-12">
      <div class="hidden lg:block">
          <img src="{{ asset('assets/hero.png') }}" class="max-w-lg rounded-lg shadow-2xl" alt="Hero Image">
      </div>
      <div class="text-center lg:text-left">
          <h1 class="text-4xl lg:text-6xl font-poppins font-medium text-black leading-tight lg:leading-[5rem]">
              Explore, shop, and repeat again.
          </h1>
          <p class="py-6 text-sm lg:text-lg text-black font-poppins font-normal">
              Temukan berbagai alat jahit terbaik untuk memenuhi kebutuhan kreatif Anda. 
              Dari mesin jahit canggih hingga aksesori premium, kami hadir untuk mendukung setiap langkah perjalanan menjahit Anda. 
              Belanja mudah, harga bersahabat, dan kualitas terjamin hanya di Adhi-Ra!
          </p>
      </div>
  </div>
</div>

<!-- Our Service Section -->
<section class="py-24 bg-primary">
  <div class="container mx-auto px-4 lg:px-24">
    <h2 class="text-2xl lg:text-4xl font-semibold font-poppins text-center mb-16 text-white">Why Should Choose Adhi-Ra?</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-14">
      <!-- Card 1 -->
      <div class="bg-white px-4 pt-10 pb-16 lg:pt-12 lg:pb-20 rounded-3xl shadow-lg text-center mx-4"> 
        <div class="text-white mb-8">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-24 w-24 mx-auto bg-primary p-4 rounded-full">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="h-24 w-24 mx-auto bg-primary p-4 rounded-full">
              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
            </svg>                    
        </div>
        <h2 class="text-2xl font-poppins font-medium text-black mb-4">Produk Berkualitas Tinggi</h2>
        <p class="font-poppins font-normal text-black px-6"> 
            Kami menyediakan alat jahit dari bahan terbaik dan merek terpercaya, memastikan daya tahan dan hasil kerja maksimal.
        </p>
      </div>
      <!-- Card 2 -->
      <div class="bg-white px-4 pt-10 pb-16 lg:pt-12 lg:pb-20 rounded-3xl shadow-lg text-center mx-4"> 
        <div class="text-white mb-8">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-24 w-24 mx-auto bg-primary p-4 rounded-full">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-24 w-24 mx-auto bg-primary p-4 rounded-full">
              <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
              <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
            </svg>
                                
        </div>
        <h2 class="text-2xl font-poppins font-medium text-black mb-4">Harga Terjangkau</h2>
        <p class="font-poppins font-normal text-black px-6"> 
          Kami menawarkan produk dengan harga yang bersaing, cocok untuk semua kalangan, mulai dari pemula hingga profesional.
        </p>
      </div>
      <!-- Card 3 -->
      <div class="bg-white px-4 pt-10 pb-16 lg:pt-12 lg:pb-20 rounded-3xl shadow-lg text-center mx-4"> 
        <div class="text-white mb-8">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-24 w-24 mx-auto bg-primary p-4 rounded-full">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-24 w-24 mx-auto bg-primary p-4 rounded-full">
              <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
            </svg>
                              
        </div>
        <h2 class="text-2xl font-poppins font-medium text-black mb-4">Layanan Pelanggan Terbaik</h2>
        <p class="font-poppins font-normal text-black px-6"> 
          Kami siap membantu Anda dengan saran dan solusi untuk semua kebutuhan alat jahit Anda, baik secara online maupun offline.        
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Frequently Searched Products Section -->
<section class="py-20">
  <div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row justify-between items-center gap-4 mb-16">
      <h2 class="text-xl lg:text-3xl font-poppins font-medium">
        <span class="text-primary font-poppins font-medium">Produk</span> yang sering dicari pelanggan
      </h2>
      <a href="{{ route('products') }}" class="text-primary text-lg lg:text-2xl font-poppins font-normal hover:underline flex items-center gap-3">
          See All Product 
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mx-auto">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
          </svg>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-14 mb-8 lg:px-24">
      <!-- Card 1 -->
      <div class="relative bg-[#FFF8F8] drop-shadow-custom px-6 pt-7 pb-10 lg:pt-9 lg:pb-8 rounded-3xl text-center mx-4"> 
        <div class="text-white mb-8">
            <img src="{{ asset('assets/benang.jpg') }}" alt="benang jahit" class="rounded-xl w-full h-60 object-cover">                  
        </div>
        <h2 class="text-2xl font-poppins font-medium text-black mb-4">Benang</h2>
      </div>
      <!-- Card 2 -->
      <div class="relative bg-[#FFF8F8] drop-shadow-custom px-6 pt-7 pb-10 lg:pt-9 lg:pb-8 rounded-3xl text-center mx-4"> 
        <div class="text-white mb-8">
            <img src="{{ asset('assets/resleting.jpg') }}" alt="resleting" class="rounded-xl w-full h-60 object-cover">                  
        </div>
        <h2 class="text-2xl font-poppins font-medium text-black mb-4">Resleting</h2>
      </div>
      <!-- Card 3 -->
      <div class="relative bg-[#FFF8F8] drop-shadow-custom px-6 pt-7 pb-10 lg:pt-9 lg:pb-8 rounded-3xl text-center mx-4"> 
        <div class="text-white mb-8">
            <img src="{{ asset('assets/kain.jpg') }}" alt="Kain Asahi" class="rounded-xl w-full h-60 object-cover">                  
        </div>
        <h2 class="text-2xl font-poppins font-medium text-black mb-4">Kain Asahi</h2>
      </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-8">
</section>
      
@include('partials.footer')
@endsection