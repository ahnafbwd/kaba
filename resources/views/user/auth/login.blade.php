<x-guest-layout>
    {{-- <!-- Page Heading -->
    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-2 lg:px-6 ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Selamat Datang!') }}
        </h2>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
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
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Lupa password?') }}
            </a>
        @endif
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('register') }}">
            {{ __('Belum punya akun? daftar disini') }}
        </a>
        <x-primary-button class="ml-3">
            {{ __('Masuk') }}
        </x-primary-button>
    </form> --}}
    <h4>Selamat Datang!</h4>
    <h6 class="font-weight-light">Yuk login terlebih dahulu.</h6>
    <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}" class="pt-3">
            @csrf
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-3">
            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Masuk</button>
        </div>
    </form>
    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
            <label for="remember_me" class="form-check-label text-muted">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                Ingat saya selalu
            </label>
        </div>
        <a href="{{ route('password.request') }}" class="auth-link text-black">Lupa Password?</a>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Buat akun sekarang</a>
    </div>
</x-guest-layout>
