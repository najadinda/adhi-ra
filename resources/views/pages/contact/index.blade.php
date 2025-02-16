@extends('layouts.layout')

@section('content')
@include('partials.navbar')

<!-- Contact Us Section -->
<section class="container py-16 flex flex-col md:flex-row gap-8 mx-auto px-4 lg:px-6 items-center">
    <div class=" md:w-1/2 w-full">
        <iframe class="w-full h-96 rounded-md"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9736501416187!2d110.39423857587705!3d-7.012381768690904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b0bf9565913%3A0x6705c7f36117fce5!2sJl.%20Taman%20Lamongan%20I%20No.2%2C%20Bendan%20Ngisor%2C%20Kec.%20Gajahmungkur%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050233!5e0!3m2!1sid!2sid!4v1739525076878!5m2!1sid!2sid"></iframe>
    </div>
    <div class="w-full md:w-1/2 space-y-6">
        <h2 class="text-black text-3xl font-poppins font-semibold">Get to Know Us!</h2>
        <p class="text-black text-lg font-poppins font-medium">Temukan lokasi kami di peta untuk lebih dekat dengan Adhi-Ra. Hubungi kami untuk pertanyaan lebih lanjut atau informasi mengenai produk kami.</p>
        <div class="flex items-center gap-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                <path d="M15 10.5a3 3 0 1 1-6 0a3 3 0 0 1 6 0"/><path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0"/></g>
            </svg>
            <p class="text-black text-base font-poppins font-normal">Jl. Taman Lamongan I No.2, Bendan Ngisor, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50233</p>
        </div>
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 20a8 8 0 0 0 8-8a8 8 0 0 0-8-8a8 8 0 0 0-8 8a8 8 0 0 0 8 8m0-18a10 10 0 0 1 10 10a10 10 0 0 1-10 10C6.47 22 2 17.5 2 12A10 10 0 0 1 12 2m.5 5v5.25l4.5 2.67l-.75 1.23L11 13V7z"/>
            </svg>
            <p class="text-black text-base font-poppins font-normal">Senin - Sabtu: 07.00 - 17.00<br>Minggu: 08.00 - 12.00 <br><span class="text-red-600 font-semibold">(Minggu terakhir tutup)</span></p>
        </div>
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"/>
            </svg>
            <p class="text-black text-base font-poppins font-normal">087892349235</p>
        </div>
    </div>
</section>

<div class="relative w-full py-56 flex flex-col items-center justify-center text-white text-center px-4 
            bg-[url('/public/assets/hero.png')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10">
      <h2 class="text-xl lg:text-4xl font-poppins font-medium">
        Punya pertanyaan lebih lanjut? <br> Jangan ragu untuk menghubungi kami!
      </h2>
      <a href="https://wa.me/087892349235" 
      class="btn mt-10 px-5 py-7 lg:px-9 lg:py-8 bg-primary font-poppins font-medium text-xl lg:text-2xl 
      text-white hover:bg-secondary content-center border-none">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 lg:w-10 lg:h-10">
            <path fill="currentColor" d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"/>
        </svg>
        WhatsApp</a>
    </div>
  </div>
  
@include('partials.footer')
@endsection