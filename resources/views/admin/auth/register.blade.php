<x-admin-guest-layout>
    <!-- Page Heading -->
    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-2 lg:px-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Register Admin') }}
        </h2>
    </div>
    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nomer Telepon -->
        <div class="mt-4">
            <x-input-label for="nomer_telepon" :value="__('Nomer Telepon')" />
            <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text" name="nomer_telepon" :value="old('nomer_telepon')" required />
            <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ml-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.login') }}">
                {{ __('Sudah punya akun? Masuk disini') }}
            </a>
        </div>
    </form>
</x-admin-guest-layout>
