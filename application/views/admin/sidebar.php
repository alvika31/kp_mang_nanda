  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('Dashboard') ?>">
          <img src="<?= base_url('assets/img/logo.png') ?>" class="logo" width="200px" alt="">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?= ($title === 'Halaman Home') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('Admin') ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->


      <!-- Nav Item - Utilities Collapse Menu -->

      <li class="nav-item <?= ($title === 'Halaman List Konsultasi Costumer') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('admin/list_advokat') ?>">
              <i class="fas fa-solid fa-user-tie"></i>
              <span>Advokat</span></a>
      </li>
      <li class="nav-item <?= ($title === 'Halaman List Konsultasi Costumer') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('admin/list_user') ?>">
              <i class="fas fa-solid fa-user-tie"></i>
              <span>User</span></a>
      </li>
      <li class="nav-item <?= ($title === 'Halaman List Konsultasi Costumer') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('admin/list_pelayanan') ?>">
              <i class="fas fa-solid fa-user-tie"></i>
              <span>Kategori Pelayanan</span></a>
      </li>
      <li class="nav-item <?= ($title === 'Halaman List Konsultasi Costumer') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('admin/list_konsultasi') ?>">
              <i class="fas fa-solid fa-user-tie"></i>
              <span>Konsultasi</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>



  </ul>
  <!-- End of Sidebar -->
  <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
              </button>
              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                  <li class="nav-item dropdown no-arrow d-sm-none">
                      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-search fa-fw"></i>
                      </a>
                      <!-- Dropdown - Messages -->
                      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                          <form class="form-inline mr-auto w-100 navbar-search">
                              <div class="input-group">
                                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                  <div class="input-group-append">
                                      <button class="btn btn-primary" type="button">
                                          <i class="fas fa-search fa-sm"></i>
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </li>


                  <!-- Nav Item - Messages -->
                  <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login Sebagai Admin</span>
                      </a>
                      <!-- Dropdown - User Information -->

                  </li>
                  <div class="topbar-divider d-none d-sm-block"></div>

                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hallo, <?= $this->session->userdata('username'); ?></span><i class="fas fa-solid fa-caret-down"></i>
                      </a>
                      <!-- Dropdown - User Information -->
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="#">
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Profile
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                          </a>
                      </div>
                  </li>

              </ul>

          </nav>