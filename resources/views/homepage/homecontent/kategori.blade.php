@php
    $tingkats = \App\Models\Tingkat::all();
@endphp
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Tingkat</h2>
            <p>Tingkatan Program</p>
        </div>
        <div class="row">
            @foreach ($tingkats as $tingkat)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="{{ $loop->iteration }}00">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">{{ $tingkat->nama_tingkat }}</a></h4>
                        <p>{{ $tingkat->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section><!-- End Services Section -->
