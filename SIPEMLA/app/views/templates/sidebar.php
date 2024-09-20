<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/sidebar.css" />
<body?>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-0 px-0 bg">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <a href="<?= BASEURL ?>/Beranda" class="d-flex align-items-center pb-3 mb-md-5 me-md-auto text-white text-decoration-none mt-3">
            <i class="fs-4 me-2"><img style="width: 60px; height: auto" src="<?= BASEURL ?>/assets/img/logo-sipemla.png" alt="logo-sipemla" /></i>
            <span class="fs-5 d-none d-sm-inline">SIPEMLA</span>
          </a>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
              <a href="<?= BASEURL ?>/Beranda" class="nav-link align-middle px-2">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/Beranda-icon.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Usermanagement" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/user-icon.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline">User Management</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Datamahasiswa" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/mahasiswa-icon.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline">Data Mahasiswa</span></a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Matakuliah" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/matkul-icon.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline">Mata Kuliah</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Pembayaran" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/pembayaran-icon.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline">Pembayaran</span>
              </a>
            </li>
          </ul>
          <hr />
          <div class="pb-4" id="menu">
            <button type="button" class="d-flex align-items-center text-white text-decoration-none nav-link px-2 rounded-3" data-bs-toggle="modal" data-bs-target="#modalLogout">
              <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/logout-icon.png" alt="logo-logout" /></i>
              <span class="d-none d-sm-inline mx-1">Logout</span>
            </button>
          </div>
        </div>
      </div>
      <div class="col py-3">