<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- NIM --}}
            <div>
                <x-label for="nim" value="{{ __('NIM atau NPP') }}" />
                <x-input id="nim" class="block mt-1 w-full"
                type="text"
                name="nim"
                :value="old('nim')"
                required
                autocomplete="nim"
                pattern="[A-Z0-9.]+"
                title="NIM harus huruf besar, angka, dan titik"
                oninput="this.value = this.value.toUpperCase()"
            />


            </div>

            {{-- Password --}}
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
            </div>

            {{-- Remember Me --}}
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                </label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Masuk') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
