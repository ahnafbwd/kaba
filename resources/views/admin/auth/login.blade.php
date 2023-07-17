<x-admin-guest-layout>
    <!-- Page Heading -->
    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-2 lg:px-6 ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Login Admin') }}
        </h2>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
    <div class="flex items-center justify-center mt-4">
            <x-primary-button class="">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-center mt-4">
            @if (Route::has('admin.password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('admin.register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.register') }}">
                    {{ __('Belum punya akun? Daftar disini') }}
                </a>
            @endif
        </div>
    </form>
</x-admin-guest-layout>
