@extends('layouts.layout')

@section('content')
<div class="container mx-auto mt-10 p-3">
    <div class="bg-white p-10 rounded-lg shadow-lg">
        <h1 class="text-2xl lg:text-3xl font-poppins font-semibold mb-10 flex items-center">
            <a href="javascript:history.back()" class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 lg:h-6 lg:w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            Profil Saya
        </h1>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-7">
                <label class="block font-poppins font-medium text-xl text-black mb-3">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="input input-bordered w-full" placeholder="Masukkan nama anda">
            </div>
            <div class="mb-7">
                <label class="block font-poppins font-medium text-xl text-black mb-3">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="input input-bordered w-full" placeholder="Masukkan email anda">
            </div>
            <div class="mb-7">
                <label class="block font-poppins font-medium text-xl text-black mb-3">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="input input-bordered w-full" placeholder="Masukkan nomor telepon anda">
            </div>
            <div class="mb-7">
                <label class="block font-poppins font-medium text-xl text-black mb-3">Alamat</label>
                <textarea name="address" class="textarea textarea-bordered w-full" placeholder="Masukkan alamat anda">{{ $user->address }}</textarea>
            </div>
            <button 
                type="submit" 
                class="btn bg-primary font-poppins font-normal text-sm text-white">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection