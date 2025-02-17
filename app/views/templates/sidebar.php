<link rel="stylesheet" href="<?= BASEURL ?>/assets/css/sidebar.css" />
<body?>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-m-2 px-sm-0 bg-light shadow-lg">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 min-vh-100">
          <a href="<?= BASEURL ?>/Beranda" class="d-flex align-items-center pb-3 mb-md-5 me-md-auto text-decoration-none mt-3">
            <i class="fs-4 me-2"><img style="width: 60px; height: auto" src="<?= BASEURL ?>/assets/img/logo-sipem.png" alt="logo-sipemla" class="logo-color" /></i>
            <span class="fs-5 d-none d-sm-inline text-dark"><b>SIPEMLA</b></span>
          </a>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
              <a href="<?= BASEURL ?>/Beranda" class="nav-link align-middle px-2">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/Beranda-icons.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline text-dark">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Usermanagement" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/user-icons.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline text-dark">User Management</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Datamahasiswa" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/mahasiswa-icons.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline text-dark">Data Mahasiswa</span></a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Matakuliah" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/matkul-icons.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline text-dark">Mata Kuliah</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Kelas" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/matkul-icons.png" alt="logo-sipemla" /></i>
                <span class="ms-1 d-none d-sm-inline text-dark">Kelas</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#registrasiSubMenu" data-bs-toggle="collapse" class="nav-link px-2 align-middle dropdown-toggle" id="registrasiMenu">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/pembayaran-icons.png" alt="registrasi-icon" /></i>
                <span class="ms-1 d-none d-sm-inline text-dark">Registrasi</span>
              </a>
              <div class="collapse ps-3" id="registrasiSubMenu">
                <ul class="list-unstyled">
                  <li><a href="<?= BASEURL ?>/Tagihan" class="nav-link px-2 text-dark">Tagihan</a></li>
                  <li><a href="<?= BASEURL ?>/Pembayaran" class="nav-link px-2 text-dark">Pembayaran</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a href="<?= BASEURL ?>/Laporan" class="nav-link px-2 align-middle">
                <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/laporan-icons.png" alt="laporan-icon" /></i>
                <span class="ms-1 d-none d-sm-inline text-dark">Cetak Pembayaran</span>
              </a>
            </li>
          </ul>
          <hr />
          <div class="pb-4" id="menu">
            <button type="button" class="d-flex align-items-center text-white text-decoration-none nav-link px-2 rounded-3" data-bs-toggle="modal" data-bs-target="#modalLogout">
              <i class="fs-4"><img style="width: 23px; height: auto" src="<?= BASEURL ?>/assets/img/logout-icons.png" alt="logo-logout" /></i>
              <span class="d-none d-sm-inline mx-1 text-dark"><b>Logout</b></span>
            </button>
          </div>
        </div>
      </div>
      <div class="col py-3">