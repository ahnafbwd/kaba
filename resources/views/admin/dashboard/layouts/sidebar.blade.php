<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#pengguna" aria-expanded="false" aria-controls="pengguna">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Pengguna</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pengguna">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="/admin/dashboard/user">
                User
                @if(request()->fullUrl() == url('/admin/dashboard/user'))
                  <span class="sr-only">(current)</span>
                @endif
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/dashboard/pengajar">
                Pengajar
                @if(request()->fullUrl() == url('/admin/dashboard/pengajar'))
                  <span class="sr-only">(current)</span>
                @endif
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/dashboard/admin">
                Admin
                @if(request()->fullUrl() == url('/admin/dashboard/admin'))
                  <span class="sr-only">(current)</span>
                @endif
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!-- ... tambahkan kode yang sama untuk bagian berikutnya -->
    </ul>
  </nav>
