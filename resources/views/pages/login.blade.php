@extends('layouts.layout')

<div class="flex items-center min-h-screen">
        
    <div class="lg:mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="max-w-lg text-center">
            <h1 class="text-2xl font-bold sm:text-3xl">Selamat Datang</h1>
        
            <p class="mt-4 text-gray-500">
                Mulailah kembali petualangan kreatif Anda. Login sekarang untuk melanjutkan eksplorasi alat dan tutorial jahit yang tak terbatas.
            </p>
        </div>
        
        <form action="{{ route('auth') }}" class="mx-auto mb-0 mt-8 max-w-md space-y-4" method="POST">
            @method('post')
            @csrf
            {{-- Email --}}
            <div class="border rounded-lg">
                <label for="email" class="sr-only">Email</label>
    
                <div class="relative">
                    <input
                        type="text"
                        value="{{ old('email') }}"
                        name="email"
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Masukkan email anda"
                    />
        
                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                        />
                        </svg>
                    </span>
                </div> 
                @error('email')
                <div class="m-2">
                    <p class="text-xs text-red-700">{{ $message }}</p>
                </div>
                @enderror
            </div>
            
            {{-- Password --}}
            <div class="border rounded-lg">
                <label for="password" class="sr-only">Password</label>
        
                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        value="{{ old('password') }}"
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Masukkan password anda"
                    />
            
                    <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                        </svg>
                    </span>
                </div>
                @error('password')
                <div class="m-2">
                    <p class="text-xs text-red-700">{{ $message }}</p>
                </div>
                @enderror
            </div>
            @error('error')
            <div class="px-5">
                <p class="text-xs text-red-700">{{ $message }}</p>
            </div>
            @enderror
            <div class="flex items-center justify-between">
                <div class="px-5">
                    <label for="remember" class="flex gap-2 items-center">
                        <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="size-3 rounded-md border-gray-200 bg-white shadow-sm"
                        />

                        <span class="text-sm text-gray-700">
                            Remember Me
                        </span>
                    </label>
                </div>
            </div>
            
            <div class="flex items-center justify-center">
                <button
                    class="w-full text-sm font-medium focus:outline-none text-white bg-primary px-12 py-3"
                    type="submit"
                    >
                    Login
                </button>
            </div>
            
            <div class="flex items-center justify-center gap-2">
                <p class="text-sm text-gray-500">Belum punya akun?</p>
                
                <a href="{{ route('register') }}" class="text-sm underline text-primary">
                    Daftar
                </a>
    
            </div>
        </form>
    </div>
</div>  
