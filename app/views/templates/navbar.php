    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/navbar.css" />

    <body>
      <nav class="navbar navbar-expand-lg navbar-dark opacity-75">
        <div class="container-fluid">
          <!-- Logo and Brand -->
          <a class="navbar-brand" href="#">
            <img src="<?= BASEURL ?>/assets/img/logo-sipemla.png" alt="Logo SIPEMLA" width="30" height="30" class="d-inline-block align-top" />
            SIPEMLA
          </a>

          <!-- Navbar Toggler for Responsive Design -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar Links -->
          <div class="container1 collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
              <a class="nav-link" href="http://localhost/SIPEMLA/Beranda">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/SIPEMLA/Datamahasiswa">Data Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/SIPEMLA/Pembayaran">Pembayaran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ?>/Login">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <script src="<?=BASEURL?>assets/js/navbar.js"></script>