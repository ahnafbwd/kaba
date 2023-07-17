@php
    $userCount = \App\Models\User::count();
    $pengajarCount = \App\Models\Pengajar::count();
    $programCount = \App\Models\Program::count();
    $angkatanCount = \App\Models\Angkatan::count();
@endphp

<!-- ======= Counts Section ======= -->
 <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ $userCount }}" data-purecounter-duration="0.5" class="purecounter"></span>
          <p>Siswa</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ $programCount }}" data-purecounter-duration="0.5" class="purecounter"></span>
          <p>Program</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ $angkatanCount }}" data-purecounter-duration="0.5" class="purecounter"></span>
          <p>Bacth</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="{{ $pengajarCount }}" data-purecounter-duration="0.5" class="purecounter"></span>
          <p>Guru</p>
        </div>

      </div>

    </div>
  </section>
  <!-- End Counts Section -->
