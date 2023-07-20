@php
     $pengajars = \App\Models\Pengajar::take(3)->get();
@endphp
<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pengajar</h2>
        <p>Pengajar Unggulan</p>
      </div>

      <div class="row gy-5">
        @foreach ($pengajars as $pengajar)
        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
          <div class="team-member">
            <div class="member-img">
              <img src="{{ asset('img/testimonials/testi.png')}}" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
              <h4>{{ $pengajar->nama_lengkap }}</h4>
              <span>Pengajar</span>
            </div>
          </div>
        </div><!-- End Team Member -->
        @endforeach
      </div>

    </div>
  </section><!-- End Team Section -->
