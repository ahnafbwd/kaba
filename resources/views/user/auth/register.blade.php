<x-guest-layout>
    <!-- Page Heading -->
    {{-- <div class="col-lg-5 d-none d-lg-block" style="background-image: url('{{ asset('/img/ctai.jpg') }}')"></div>
    <div class="col-lg-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Pendaftaran Akun</h1>
            </div>
            <form method="POST" action="{{ route('register') }}" class="user">
                @csrf
                <div class="mt-4">
                    <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                    <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap"
                        :value="old('nama_lengkap')" required autofocus />
                    <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                </div>
                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="nomer_telepon" :value="__('Nomer Telepon')" />
                    <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text" name="nomer_telepon"
                        :value="old('nomer_telepon')" required />
                    <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2" />
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <!-- Jenis Kelamin -->
                        <div class="mt-4">
                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- Tanggal Lahir -->
                        <div class="mt-4">
                            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                            <x-date-input id="tanggal_lahir" class="block mt-1 w-full" type="date"
                                name="tanggal_lahir" :value="old('tanggal_lahir')" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <!-- Alamat -->
                <div class="mt-4">
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <textarea id="alamat"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="alamat" required>{{ old('alamat') }}</textarea>
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>


                <div class="d-sm-flex align-items-center justify-end mt-4 justify-content-center">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary btn-user btn-block mb-4 btn-lg-6" type="btn-submit">
                                Daftar
                            </button>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Sudah punya akun? Masuk') }}
                            </a>
                        </div>
                        {{-- <div class="col">
                            <x-primary-button class="btn btn-primary btn-user btn-block">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div> --}}
    {{-- </div>
                </div>
            </form>
        </div>
    </div> --}}
    <h4>Daftar Sekarang</h4>
    <h6 class="font-weight-light">Yuk daftar terlebih dahulu sebelum belajar</h6>
        <form method="POST" action="{{ route('register') }}" class="pt-3">
            @csrf
        <div class="form-group">
            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')"
                required autofocus />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="nomer_telepon" :value="__('Nomer Whatsapp')" />
            <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text" name="nomer_telepon"
                :value="old('nomer_telepon')" required />
            <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin"
                class="block appearance-none w-full py-2 px-3 text-primary border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="Laki-laki" class="text-primary">Laki-laki</option>
                <option value="Perempuan" class="text-primary">Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
            <x-date-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir"
                :value="old('tanggal_lahir')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                name="alamat" required>{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>
        <div class="mb-4">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Saya telah menyetujui dan membaca Syarat & Ketentuan Kaba
                </label>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Daftar</button>
        </div>
        <div class="text-center mt-4 font-weight-light">
            Sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary">Masuk</a>
        </div>
    </form>
</x-guest-layout>
