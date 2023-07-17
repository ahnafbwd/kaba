<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <a class="navbar-brand" href="/"><img src="{{ asset('img/logoe.svg') }}" alt="Logo Kaba"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="/active" href="/">Beranda</a></li>
                <li><a href="/about">Tentang Kami</a></li>
                <li><a href="/program">Program</a></li>
                <li><a href="/contact">Kontak Kami</a></li>
                <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/pengajar/login">Pengajar</a></li>
                        <li><a href="#">Acara</a></li>
                        <li class="dropdown"><a href="#"><span>Mitra</span><iclass="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Kerjasama</a></li>
                                <li><a href="#">Lowongan</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <div class="signin-signup-btns">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 sm:block">
                    @auth
                        @if (Auth::guard('admin')->check())
                            <a href="{{ url('/admin/dashboard') }}" class="login-btn">Admin Dashboard</a>
                        @elseif (Auth::guard('pengajar')->check())
                            <a href="{{ url('/pengajar/dashboard') }}" class="login-btn">Pengajar Dashboard</a>
                        @else
                            <a href="{{ url('/user/dashboard') }}" class="login-btn">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register-btn">Daftar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </div>
</header>
<!-- End Header -->
