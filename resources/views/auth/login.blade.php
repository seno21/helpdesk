<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="brand-logo mb-3">
        <img src="{{ asset('images/logo.svg') }}" alt="logo">
    </div>
    <h1 class="text-lg font-weight-bold mb-1" style="font-size: 20px;">
        SISTEM INFORMASI HELPDESK TICKETING
    </h1>
    <hr class="mb-3" style="border: solid 2px #51998C;">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Halaman Edit saya --}}

        {{-- End halaman Edit saya --}}
        {{-- Logo Custom --}}


        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="items-center mt-4">
            <x-primary-button class="mb-2 text-md">
                {{ __('SIGN IN') }}
            </x-primary-button>

            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}
        </div>
    </form>
    {{-- <a href="{{ route('register') }}"
        class="mb-2 mt-2 text-md btn btn-block btn-secondary bg-secondary btn-lg font-weight-bold text-light auth-form-btn">REGISTER</a> --}}
</x-guest-layout>
