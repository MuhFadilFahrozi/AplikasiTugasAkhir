<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        {{-- Header --}}
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Selamat Datang</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan masuk ke akun Anda</p>
        </div>

        {{-- Validation Errors --}}
        <x-validation-errors class="mb-4" />

        {{-- Status Message --}}
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg border border-green-200">
                {{ session('status') }}
            </div>
        @endif

        {{-- Login Form --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            {{-- NIM / NPP --}}
            <div>
                <x-label for="nim" value="{{ __('NIM atau NPP') }}" class="font-semibold" />
                <x-input 
                    id="nim" 
                    class="block mt-2 w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    type="text"
                    name="nim"
                    :value="old('nim')"
                    required
                    autofocus
                    autocomplete="nim"
                    pattern="[A-Z0-9.]+"
                    title="NIM harus huruf besar, angka, dan titik"
                    oninput="this.value = this.value.toUpperCase()"
                    placeholder="Contoh: A11.2023.12345"
                />
                <p class="mt-2 text-xs text-gray-500">*Gunakan huruf kapital</p>
            </div>

            {{-- Password --}}
            <div class="mt-3">
                <div class="flex justify-between items-center">
                    <x-label for="password" value="{{ __('Password') }}" class="font-semibold" />
                    @if (Route::has('password.request'))
                        <a class="text-xs text-indigo-600 hover:text-indigo-800 font-medium transition" 
                           href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>
                <x-input 
                    id="password" 
                    class="block mt-2 w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password"
                    placeholder="••••••••"
                />
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center mb-4">
                
            </div>

            {{-- Submit Button --}}
            <div class="pt-1">
                <x-button class="w-full justify-center py-3 text-base font-semibold">
                    {{ __('Masuk') }}
                </x-button>
            </div>
        </form>


        {{-- Register Section --}}
        <div>
            <div >
                <div class="text-center">
                    <div class="inline-flex items-center justify-center  ">
                        
                    </div>
                    <p class="text-sm text-gray-700 font-medium mb-4">
                        Belum punya akun?
                    </p>
                    <a href="{{ route('register') }}" 
                       class="inline-block w-full px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        Daftar Akun Baru
                    </a>
                </div>
            </div>
        </div>

    </x-authentication-card>
</x-guest-layout>