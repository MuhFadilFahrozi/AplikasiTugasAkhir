<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div>
                <x-label for="name" value="{{ __('Nama Lengkap') }}" />
                <x-input id="name" class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    placeholder="Contoh: Jokowi Prabroro"
                    required autofocus autocomplete="name" />
            </div>

            {{-- NIM --}}
            <div class="mt-4">
                <x-label for="nim" value="{{ __('NIM atau NPP') }}" />
                <x-input id="nim" class="block mt-1 w-full"
                    type="text"
                    name="nim"
                    :value="old('nim')"
                    placeholder="Contoh: A11.2021.12345 atau NPP.123456"
                    required
                    autocomplete="nim"
                    pattern="[A-Z0-9.]+"
                    title="NIM harus huruf besar, angka, dan titik"
                    oninput="this.value = this.value.toUpperCase()"
                />
            </div>

            {{-- Email  --}}
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email (Opsional)') }}" />
                <x-input id="email" class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    placeholder="Contoh: ahmad.rizki@example.com"
                    autocomplete="email" />
            </div>

            {{-- Phone --}}
            <div class="mt-4">
                <x-label for="phone" value="{{ __('No. Telepon') }}" />
                <x-input id="phone" class="block mt-1 w-full"
                    type="text"
                    name="phone"
                    :value="old('phone')"
                    placeholder="Contoh: 08123456789"
                    required autocomplete="phone" />
            </div>

            {{-- Password --}}
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required autocomplete="new-password" />
            </div>

            {{-- Confirm Password --}}
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    placeholder="Masukkan ulang password"
                    required autocomplete="new-password" />
            </div>

            {{-- Terms and Privacy Policy --}}
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('Saya setuju dengan :terms_of_service dan :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Syarat Layanan').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Kebijakan Privasi').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            {{-- Submit --}}
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Daftar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>